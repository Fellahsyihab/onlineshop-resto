<?php

namespace App\Http\Controllers;

// dalam file ProductController.php

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        // Ambil data kategori untuk dropdown
        $categories = DB::table('categories')->get();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi form jika diperlukan
        $request->validate([
            // Sesuaikan dengan aturan validasi yang diperlukan
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan file gambar ke dalam folder public/images
        $imagePath = $request->file('image')->store('images', 'public');

    // Simpan data produk baru
    $product = new Product([
        'name' => $request->input('name'),
        'category_id' => $request->input('category_id'),
        'product_code' => $request->input('product_code'),
        'price' => $request->input('price'),
        'unit' => $request->input('unit'),
        'stock' => $request->input('stock'),
        'description' => $request->input('description'),
        'image' => $imagePath, // Simpan path gambar ke dalam database
    ]);

    $product->save();

    return redirect('/products')->with('success', 'Product added successfully!');
}

    public function edit($id)
    {
        // Ambil data produk yang akan diedit
        $product = DB::table('products')->where('id', $id)->first();

        // Ambil data kategori untuk dropdown
        $categories = DB::table('categories')->get();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
{
    // Validasi form jika diperlukan
    $request->validate([
        // Sesuaikan dengan aturan validasi yang diperlukan
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Simpan file gambar ke dalam folder public/images
    $imagePath = $request->file('image')->store('images', 'public');

    // Update data produk
    DB::table('products')->where('id', $id)->update([
        'name' => $request->input('name'),
        'category_id' => $request->input('category_id'),
        'product_code' => $request->input('product_code'),
        'price' => $request->input('price'),
        'unit' => $request->input('unit'),
        'stock' => $request->input('stock'),
        'description' => $request->input('description'),
        'image' => $imagePath, // Simpan path gambar ke dalam database
    ]);

    return redirect('/products')->with('success', 'Product updated successfully!');
}

    public function destroy($id)
    {
        // Hapus data produk
        DB::table('products')->where('id', $id)->delete();

        return redirect('/products')->with('success', 'Product deleted successfully!');
    }
}

