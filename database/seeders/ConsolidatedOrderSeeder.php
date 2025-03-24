<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use Illuminate\Database\Seeder;
use App\Models\ConsolidatedOrder;
use App\Services\ConsolidatedOrderService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConsolidatedOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run()
    // {
    //     ConsolidatedOrder::factory()->count(50)->create();
    // }

     public function run()
    {
        OrderItem::factory()->count(50)->create();

        $service = new ConsolidatedOrderService();
        $service->refreshConsolidatedOrders();
    }
}
