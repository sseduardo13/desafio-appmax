<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Stock;

class ApiStockController extends Controller
{
    public function addProductToStock(Request $request)
    {
        $product = Product::where('sku', $request->sku)->first();
        
        if ($product && ($request->amount && $request->amount > 0)) {
            $stock = new Stock;
            
            $stock->id_product = $product->id;
            $stock->operation = 'add';
            $stock->origin = 'api';
            $stock->amount = $request->amount;
            $stock->save();
            
            $product->amount += $request->amount;
            $product->save();
            
            return response()->json(['success' => "Quantidade adicionada ao estoque com sucesso"], 200);
        } else {
            return response()->json(['error' => "Quantidade não adicionada ao estoque"], 406);
        }      
    }

    public function downProductFromStock(Request $request)
    {
        $product = Product::where('sku', $request->sku)->first();
        
        if ($product && $request->client) {
            if ($request->amount <= $product->amount && ($request->amount && $request->amount > 0)) {
                $stock = new Stock;
                
                $stock->id_product = $product->id;
                $stock->operation = 'down';
                $stock->origin = 'api';
                $stock->amount = $request->amount;
                $stock->save();
                
                $product->amount -= $request->amount;
                $product->save();
                
                return response()->json(['success' => "Quantidade baixada do estoque com sucesso"], 200);
            } else {
                return response()->json(['error' => "Quantidade solicitada maior que quantidade em estoque."], 406);    
            }
        } else {
            return response()->json(['error' => "Quantidade não removida do estoque"], 406);
        } 
    }
}
