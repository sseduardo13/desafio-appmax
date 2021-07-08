<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function getStockReport(Request $request)
    {
        $request->validate([
            'date_begin' => 'required|before_or_equal:date_end',
            'date_end' => 'required|after_or_equal:date_begin',
            'operation' => 'required|string'
        ]);

        $reportModel = new Report();

        $transactions = $reportModel->getStockReport($request->date_begin, $request->date_end, $request->operation);

        $operation = $request->operation == "add" ? "entrada" : "saída";

        return view('reports.stock-report', compact('transactions', 'operation'));
    }
}
