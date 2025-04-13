<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // Menampilkan form tambah produk
    public function add()
    {
        $categories = Category::all();

        return view('seller.add', compact('categories'));
    }

    // Menyimpan produk ke database
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'link_tokopedia' => 'nullable|url',
            'link_shopee' => 'nullable|url',
            'link_gofood' => 'nullable|url',
            'link_shopee_food' => 'nullable|url',
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Product::create([
            'id' => (string) Str::uuid(),
            'store_id' => auth()->user()->store->id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'link_tokopedia' => $request->link_tokopedia,
            'link_shopee' => $request->link_shopee,
            'link_gofood' => $request->link_gofood,
            'link_shopee_food' => $request->link_shopee_food,
            'thumbnail' => $thumbnailPath,
            'stock' => $request->stock,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
    }
}
