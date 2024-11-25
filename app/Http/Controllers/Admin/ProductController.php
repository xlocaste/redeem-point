<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Product;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return Inertia::render('Admin/Products', [
            'products' => $products,
        ]);
    }

    // public function store(StoreRequest $request)
    // {
    //     Product::create($request->all());

    //     return redirect()->route('admin.products')->with('success', 'Produk berhasil ditambahkan.');
    // }

    // public function update(UpdateRequest $request, Product $product)
    // {
    //     $product->update($request->all());

    //     return redirect()->route('admin.products')->with('success', 'Produk berhasil diperbarui.');
    // }

    // public function destroy(Product $product)
    // {
    //     $product->delete();

    //     return redirect()->route('admin.products')->with('success', 'Produk berhasil dihapus.');
    // }
}
