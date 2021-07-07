<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function addProduct($id)
    {   
        $product = Product::findOrFail($id);
        
        return view('stock.add-stock', compact('product'));
    }
    
    public function storeAddStock(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required:numeric'
        ]);

        $product = Product::findOrFail($id);
        
        if ($product) {
            $stock = new Stock;
    
            $stock->id_product = $product->id;
            $stock->operation = 'add';
            $stock->origin = 'system';
            $stock->amount = $request->amount;
            $stock->save();
    
            $product->amount += $request->amount;
            $product->save();
    
            return redirect()->route('products.index')->with('success', 'Quantidade adicionada ao estoque com sucesso.');
        } else {
            return redirect()->back()->withErrors(['Produto não cadastrado.']);
        }

    }

    public function downProduct($id)
    {   
        $product = Product::findOrFail($id);
        
        return view('stock.down-stock', compact('product'));
    }

    public function storeDownStock(Request $request, $id)
    {
        $request->validate([
            'client' => 'required',
            'amount' => 'required:numeric'
        ]);

        $product = Product::findOrFail($id);

        if ($product) {
            if ($request->amount <= $product->amount) {
                $stock = new Stock;
        
                $stock->id_product = $product->id;
                $stock->client = $request->client;
                $stock->operation = 'down';
                $stock->origin = 'system';
                $stock->amount = $request->amount;
                $stock->save();
        
                $product->amount -= $request->amount;
                $product->save();
                
                return redirect()->route('products.index')->with('success', 'Quantidade baixada do estoque com sucesso.');
            } else {
                return redirect()->back()->withErrors(['Quantidade solicitada maior que quantidade em estoque.']);
            }
        } else {
            return redirect()->back()->withErrors(['Produto não cadastrado.']);
        }  

    }
}
