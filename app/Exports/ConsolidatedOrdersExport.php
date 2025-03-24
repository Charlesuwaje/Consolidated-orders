<?php

namespace App\Exports;

use App\Models\ConsolidatedOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ConsolidatedOrdersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return ConsolidatedOrder::all([
            'order_id', 'customer_id', 'customer_name', 'customer_email',
            'product_id', 'product_name', 'sku', 'quantity', 'item_price',
            'line_total', 'order_date', 'order_status', 'order_total'
        ]);
    }

    public function headings(): array
    {
        return [
            'Order ID', 'Customer ID', 'Customer Name', 'Customer Email',
            'Product ID', 'Product Name', 'SKU', 'Quantity', 'Item Price',
            'Line Total', 'Order Date', 'Order Status', 'Order Total'
        ];
    }
}

