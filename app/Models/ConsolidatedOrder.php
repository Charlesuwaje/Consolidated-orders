<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsolidatedOrder extends Model
{
    use HasFactory;

    // protected $table = 'consolidated_orders';

    protected $fillable = [
        'order_id',
        'customer_id',
        'customer_name',
        'customer_email',
        'product_id',
        'product_name',
        'sku',
        'quantity',
        'item_price',
        'line_total',
        'order_date',
        'order_status',
        'order_total',
        'created_at',
        'updated_at',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
