<?php

namespace App\Actions;

use App\Exceptions\BusinessRuleException;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CancelOrderItemAction
{
    public function __construct(
        private RecordInventoryMovementAction $recordInventoryMovementAction
    ) {}

    public function execute(string $orderId, string $id, array $data)
    {
        return DB::transaction(function () use ($orderId, $id, $data) {
            $order = Order::forCurrentBusiness()->findOrFail($orderId);
            $item  = $order->orderItems()->findOrFail($id);

            if (in_array($item->status, ['paid', 'cancelled'])) {
                throw new BusinessRuleException('No se puede cancelar este item.');
            }

            $wasPending = $item->status === 'pending';

            $item->fill($data);
            $item->status = 'cancelled';
            $item->closed_at = Carbon::now();
            $item->save();

            if ($item->product->track_inventory && $wasPending) {
                $this->recordInventoryMovementAction->execute(
                    $item->product_id,
                    [
                        'quantity_change' => $item->quantity,
                        'reason' => 'cancellation',
                    ],
                    $item->id,
                );
            }

            return $item;
        });
    }
}