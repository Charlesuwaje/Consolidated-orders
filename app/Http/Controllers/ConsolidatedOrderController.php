<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ConsolidatedOrdersExport;
use App\Imports\ConsolidatedOrdersImport;
use App\Services\ConsolidatedOrderService;
use App\Exports\ConsolidatedOrdersTemplateExport;

class ConsolidatedOrderController extends Controller
{
    public function __construct(private ConsolidatedOrderService $service) {}

    public function export()
    {
        return Excel::download(new ConsolidatedOrdersExport, 'consolidated_orders.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv|max:2048'
        ]);

        Excel::import(new ConsolidatedOrdersImport, $request->file('file'));

        return response()->json(['message' => 'File imported successfully'], 200);
    }
    public function downloadImportTemplate()
    {
        return Excel::download(new ConsolidatedOrdersTemplateExport, 'consolidated_orders_template.xlsx');
    }
    public function index(): JsonResponse
    {
        return response()->json($this->service->getConsolidatedOrders());
    }
    public function refresh(): JsonResponse
    {
        $this->service->refreshConsolidatedOrders();
        return response()->json(['message' => 'Consolidated orders table refreshed successfully.'], 200);
    }
}
