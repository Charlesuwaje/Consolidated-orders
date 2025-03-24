<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConsolidatedOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id'             => $this->id,
            'order_id'       => $this->order_id,
            'customer_id'    => $this->customer_id,
            'customer_name'  => $this->customer_name,
            'customer_email' => $this->customer_email,
            'product_id'     => $this->product_id,
            'product_name'   => $this->product_name,
            'sku'            => $this->sku,
            'quantity'       => $this->quantity,
            'item_price'     => $this->item_price,
            'line_total'     => $this->line_total,
            'order_date'     => $this->order_date,
            'order_status'   => $this->order_status,
            'order_total'    => $this->order_total,
            'created_at'     => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at'     => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
