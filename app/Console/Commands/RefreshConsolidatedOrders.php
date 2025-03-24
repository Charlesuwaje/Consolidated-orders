<?php

namespace App\Console\Commands;
use App\Services\ConsolidatedOrderService;
use Illuminate\Console\Command;

class RefreshConsolidatedOrders extends Command
{
    protected $signature = 'orders:refresh';
    protected $description = 'Refresh the consolidated_orders table';

    public function __construct(private ConsolidatedOrderService $service)
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->service->refreshConsolidatedOrders();
        $this->info('consolidated_orders table refreshed successfully!');
    }
}