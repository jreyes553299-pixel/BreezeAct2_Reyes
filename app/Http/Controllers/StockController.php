<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

use App\Models\Product;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with('product')->get();
        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        $products = Product::all();
        return view('stocks.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'type' => 'required|in:in,out',
            'remarks' => 'nullable|string',
        ]);

        Stock::create($request->all());

        return redirect()->route('stocks.index')->with('success', 'Stock transaction recorded successfully.');
    }

    public function show(Stock $stock)
    {
        return view('stocks.show', compact('stock'));
    }

    public function edit(Stock $stock)
    {
        $products = Product::all();
        return view('stocks.edit', compact('stock', 'products'));
    }

    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'type' => 'required|in:in,out',
            'remarks' => 'nullable|string',
        ]);

        $stock->update($request->all());

        return redirect()->route('stocks.index')->with('success', 'Stock transaction updated successfully.');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stocks.index')->with('success', 'Stock transaction deleted successfully.');
    }
}
