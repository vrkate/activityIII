<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductsStoreRequest;
use App\Http\Requests\ProductsUpdateRequest;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::get();

        return view('products.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('products.create');
    }
    
    public function store(ProductsStoreRequest $request)
    {
        $product = Product::create([
            'name' => $request->post('name'),
            'stocks' => $request->post('stocks')
        ]);

        return redirect(route('products.index'));
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();

        return view('products.edit', [
            'product' => $product
        ]);
    }

    public function update(ProductsUpdateRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->post('name'),
            'stocks' => $request->post('stocks'),
        ]);


        return redirect(route('products.index'));
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();


        return redirect(route('products.index'));
    }
}
