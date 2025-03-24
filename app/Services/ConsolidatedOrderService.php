<?php

namespace App\Services;

use App\Models\OrderItem;
use App\Models\ConsolidatedOrder;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ConsolidatedOrderResource;
use Illuminate\Http\Request;

class ConsolidatedOrderService
{
    public function refreshConsolidatedOrders(): void
    {
        DB::transaction(function () {
            ConsolidatedOrder::query()->delete();

            $orderItems = OrderItem::with(['order.customer', 'product'])->get();

            if ($orderItems->isEmpty()) {
                return;
            }

            $consolidatedData = $orderItems->map(function ($item) {
                return [
                    'order_id'       => $item->order?->id,
                    'customer_id'    => $item->order?->customer?->id,
                    'customer_name'  => $item->order?->customer?->name,
                    'customer_email' => $item->order?->customer?->email,
                    'product_id'     => $item->product?->id,
                    'product_name'   => $item->product?->name,
                    'sku'            => $item->product?->sku,
                    'quantity'       => $item->quantity ?? 0,
                    'item_price'     => $item->price ?? 0,
                    'line_total'     => ($item->quantity ?? 0) * ($item->price ?? 0),
                    'order_date'     => $item->order?->order_date ?? now(),
                    'order_status'   => $item->order?->status ?? 'unknown',
                    'order_total'    => $item->order?->total_amount ?? 0,
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ];
            })->toArray();

            ConsolidatedOrder::insert($consolidatedData);
        });
    }

    public function getConsolidatedOrders($perPage = 20)
    {
        return ConsolidatedOrder::paginate($perPage);
    }

    // public function getConsolidatedOrders($perPage = 20)
    // {
    //     $orders = ConsolidatedOrder::paginate($perPage);
    //     return ConsolidatedOrderResource::collection($orders);
    // }
}
