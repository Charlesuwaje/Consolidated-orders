<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Order::class;

    public function definition()
    {
        return [
            'customer_id' => Customer::factory(),
            'order_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'status' => $this->faker->randomElement(['pending', 'shipped', 'delivered']),
            'total_amount' => $this->faker->randomFloat(2, 50, 2000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
