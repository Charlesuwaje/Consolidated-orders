<?php

namespace App\Exports;

use App\Models\ConsolidatedOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;

class ConsolidatedOrdersTemplateExport implements FromArray, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
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
        ];
    }
    public function array(): array
    {
        return [];
    }
}
