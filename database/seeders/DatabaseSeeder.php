<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            ConsolidatedOrderSeeder::class,
        ]);
    }
    // public function run()
    // {
    //     // Create 50 customers
    //     Customer::factory()->count(50)->create();

    //     // Create 100 products
    //     Product::factory()->count(100)->create();

    //     // Create 200 orders, each with 1-5 order items
    //     Order::factory()
    //         ->count(200)
    //         ->has(OrderItem::factory()->count(rand(1, 5)))
    //         ->create();
    // }
}
