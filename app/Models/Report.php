<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['date_begin', 'date_end', 'operation'];

    public function getStockReport($date_begin, $date_end, $operation)
    {
        $transactions = DB::table('stocks')
        ->select(DB::raw("
            products.sku,
            products.name AS nome,
            SUM(stocks.amount) AS quantidade,
            IF(stocks.origin = 'api', 'API', 'Sistema') AS origem,
            products.amount AS estoque_atual,
            IF(products.amount < 100, 'Baixo', 'Normal') AS nivel"
        ))
        ->join('products', 'products.id', '=', 'stocks.id_product')
        ->whereNull('products.deleted_at')
        ->where('stocks.operation', $operation)
        ->whereDate('stocks.created_at', '>=', $date_begin)
        ->whereDate('stocks.created_at', '<=', $date_end)
        ->groupBy('products.sku', 'products.name', 'stocks.origin')
        ->orderByDesc('quantidade')
        ->get();

        return $transactions;
    }
}
