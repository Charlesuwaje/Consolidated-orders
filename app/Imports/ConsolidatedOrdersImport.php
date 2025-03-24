<?php

namespace App\Imports;

use App\Models\ConsolidatedOrder;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ConsolidatedOrdersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // return new ConsolidatedOrder([
        //     'order_id'      => $row[0],
        //     'customer_id'   => $row[1],
        //     'customer_name' => $row[2],
        //     'customer_email'=> $row[3],
        //     'product_id'    => $row[4],
        //     'product_name'  => $row[5],
        //     'sku'           => $row[6],
        //     'quantity'      => $row[7],
        //     'item_price'    => $row[8],
        //     'line_total'    => $row[9],
        //     'order_date'    => $row[10],
        //     'order_status'  => $row[11],
        //     'order_total'   => $row[12],
        // ]);

        return new ConsolidatedOrder([
            'order_id'      => $row['order_id'] ?? null,
            'customer_id'   => $row['customer_id'] ?? null,
            'customer_name' => $row['customer_name'] ?? '',
            'customer_email' => $row['customer_email'] ?? '',
            'product_id'    => $row['product_id'] ?? null,
            'product_name'  => $row['product_name'] ?? '',
            'sku'           => $row['sku'] ?? '',
            'quantity'      => $row['quantity'] ?? 0,
            'item_price'    => $row['item_price'] ?? 0.00,
            'line_total'    => $row['line_total'] ?? 0.00,
            'order_date'    => $this->convertExcelDate($row['order_date'] ?? now()),
            'order_status'  => $row['order_status'] ?? 'pending',
            'order_total'   => $row['order_total'] ?? 0.00,
        ]);
    }

    private function convertExcelDate($date)
    {
        if (is_numeric($date)) {
            return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date)->format('Y-m-d H:i:s');
        }

        return $date;
    }
}
