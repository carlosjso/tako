<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property string $id
 * @property string $name
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $currency
 * @property array<array-key, mixed>|null $business_hours
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CashRegisterSession> $cashRegisterSessions
 * @property-read int|null $cash_register_sessions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RestaurantTable> $restaurantTables
 * @property-read int|null $restaurant_tables_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ServiceType> $serviceTypes
 * @property-read int|null $service_types_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WorkShift> $workShifts
 * @property-read int|null $work_shifts_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Business newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Business newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Business onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Business query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Business whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Business whereBusinessHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Business whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Business whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Business whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Business whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Business whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Business whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Business whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Business wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Business whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Business withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Business withoutTrashed()
 */
	class Business extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $business_id
 * @property string $opened_by_user_id
 * @property string|null $closed_by_user_id
 * @property int $opening_cash
 * @property int|null $closing_cash_counted
 * @property int|null $expected_cash
 * @property int|null $cash_difference
 * @property string $opened_at
 * @property string|null $closed_at
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Business|null $business
 * @property-read \App\Models\User|null $closedBy
 * @property-read \App\Models\User|null $openedBy
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Payment> $payments
 * @property-read int|null $payments_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CashRegisterSession newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CashRegisterSession newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CashRegisterSession query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CashRegisterSession whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CashRegisterSession whereCashDifference($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CashRegisterSession whereClosedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CashRegisterSession whereClosedByUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CashRegisterSession whereClosingCashCounted($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CashRegisterSession whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CashRegisterSession whereExpectedCash($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CashRegisterSession whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CashRegisterSession whereOpenedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CashRegisterSession whereOpenedByUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CashRegisterSession whereOpeningCash($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CashRegisterSession whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CashRegisterSession whereUpdatedAt($value)
 */
	class CashRegisterSession extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $business_id
 * @property string $name
 * @property int $display_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Business|null $business
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereDisplayOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category withoutTrashed()
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $product_id
 * @property string|null $order_item_id
 * @property int $quantity_change
 * @property string $reason
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\OrderItem|null $orderItem
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryMovement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryMovement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryMovement query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryMovement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryMovement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryMovement whereOrderItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryMovement whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryMovement whereQuantityChange($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryMovement whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InventoryMovement whereUpdatedAt($value)
 */
	class InventoryMovement extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $business_id
 * @property string|null $table_id
 * @property string $work_shift_id
 * @property int $display_number
 * @property string $status
 * @property int $discount_amount
 * @property int $discount_percent
 * @property string|null $closed_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Business|null $business
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderItem> $orderItems
 * @property-read int|null $order_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Payment> $payments
 * @property-read int|null $payments_count
 * @property-read \App\Models\RestaurantTable|null $restaurantTable
 * @property-read \App\Models\WorkShift $workShift
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereClosedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereDiscountAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereDiscountPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereDisplayNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereTableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereWorkShiftId($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $order_id
 * @property string $product_id
 * @property int $quantity
 * @property int $unit_price_at_sale
 * @property int $unit_cost_at_sale
 * @property string|null $modifiers
 * @property string $status
 * @property string|null $cancel_reason
 * @property string|null $closed_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\InventoryMovement> $inventoryMovements
 * @property-read int|null $inventory_movements_count
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereCancelReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereClosedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereModifiers($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereUnitCostAtSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereUnitPriceAtSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem withoutTrashed()
 */
	class OrderItem extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $cash_register_session_id
 * @property string $order_id
 * @property string $method
 * @property int $amount
 * @property int $tip_amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CashRegisterSession $cashRegisterSession
 * @property-read \App\Models\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereCashRegisterSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereTipAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereUpdatedAt($value)
 */
	class Payment extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $business_id
 * @property string $category_id
 * @property string $name
 * @property string|null $image_url
 * @property int $sale_price
 * @property int $production_cost
 * @property int $current_stock
 * @property bool $is_available
 * @property bool $track_inventory
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Business|null $business
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\InventoryMovement> $inventoryMovements
 * @property-read int|null $inventory_movements_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderItem> $orderItems
 * @property-read int|null $order_items_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCurrentStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereIsAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereProductionCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereSalePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereTrackInventory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product withoutTrashed()
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $business_id
 * @property string $label
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Business|null $business
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RestaurantTable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RestaurantTable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RestaurantTable onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RestaurantTable query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RestaurantTable whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RestaurantTable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RestaurantTable whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RestaurantTable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RestaurantTable whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RestaurantTable whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RestaurantTable whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RestaurantTable withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RestaurantTable withoutTrashed()
 */
	class RestaurantTable extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $name
 * @property \Illuminate\Support\Carbon $created_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Business> $businesses
 * @property-read int|null $businesses_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceType query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ServiceType whereName($value)
 */
	class ServiceType extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $business_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property string $role
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Business|null $business
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WorkShift> $workShifts
 * @property-read int|null $work_shifts_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * @property string $id
 * @property string $business_id
 * @property string $user_id
 * @property string $clock_in
 * @property string|null $clock_out
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Business|null $business
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkShift newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkShift newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkShift query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkShift whereBusinessId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkShift whereClockIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkShift whereClockOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkShift whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkShift whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkShift whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkShift whereUserId($value)
 */
	class WorkShift extends \Eloquent {}
}

