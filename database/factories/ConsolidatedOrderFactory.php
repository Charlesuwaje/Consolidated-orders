<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\ConsolidatedOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ConsolidatedOrder>
 */
class ConsolidatedOrderFactory extends Factory
{
    protected $model = ConsolidatedOrder::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $order = Order::factory()->create();
        $product = Product::factory()->create();

        return [
            'order_id'       => $order->id,
            'customer_id'    => $order->customer_id,
            'customer_name'  => $order->customer->name,
            'customer_email' => $order->customer->email,
            'product_id'     => $product->id,
            'product_name'   => $product->name,
            'sku'            => $product->sku,
            'quantity'       => $this->faker->numberBetween(1, 10),
            'item_price'     => $this->faker->randomFloat(2, 10, 500),
            'line_total'     => function (array $attributes) {
                return $attributes['quantity'] * $attributes['item_price'];
            },
            'order_date'     => $this->faker->date(),
            'order_status'   => $this->faker->randomElement(['pending', 'shipped', 'delivered']),
            'order_total'    => $this->faker->randomFloat(2, 100, 1000),
            'created_at'     => now(),
            'updated_at'     => now(),
        ];
    }
}
