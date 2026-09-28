<?php

namespace App\Domain\Orders\Actions;

use App\Domain\Exceptions\BusinessRuleException;
use App\Domain\InventoryMovements\Actions\RecordInventoryMovementAction;
use App\Domain\Orders\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CancelOrderAction
{
    public function __construct(
        private RecordInventoryMovementAction $recordInventoryMovementAction
    ) {}

    public function execute(string $id)
    {
        return DB::transaction(function () use ($id) {
            $order = Order::forCurrentBusiness()->findOrFail($id);

            if (in_array($order->status, ['paid', 'cancelled'])) {
                throw new BusinessRuleException('No se puede cancelar esta orden.');
            }

            $items = $order->orderItems()->whereNotIn('status', ['paid', 'cancelled'])->get();

            foreach ($items as $item) {
                $wasPending = $item->status === 'pending';

                $item->status = 'cancelled';
                $item->closed_at = Carbon::now();
                $item->save();

                if ($item->product->track_inventory && $wasPending) {
                    $this->recordInventoryMovementAction->execute(
                        $item->product_id,
                        ['quantity_change' => $item->quantity, 'reason' => 'cancellation'],
                        $item->id
                    );
                }
            }

            $order->status = 'cancelled';
            $order->closed_at = Carbon::now();
            $order->save();

            return $order;
        });
    }
}
