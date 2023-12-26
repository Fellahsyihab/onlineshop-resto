<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
     // Mengambil data dari tabel produk
     $totalProducts = Product::count();
     $totalCategories = Product::distinct('category_id')->count();
     $totalStock = Product::sum('stock');

     // Mengambil data untuk Column Chart: Jumlah Produk per Kategori
     $productsByCategory = Product::select('category_id', \DB::raw('count(*) as total'))
         ->groupBy('category_id')
         ->get();
     $dataColumnChart['categories'] = $productsByCategory->pluck('category_id');
     $dataColumnChart['data'] = $productsByCategory->pluck('total');

     // Mengambil data untuk Pie Chart: Jumlah Total Harga per Kategori
     $totalPriceByCategory = Product::select('category_id', \DB::raw('sum(price) as total'))
         ->groupBy('category_id')
         ->get();
     $dataPieChart = $totalPriceByCategory->map(function ($item) {
         return ['name' => $item->category_id, 'y' => $item->total];
     });

     // Mengambil data untuk Column Chart: Jumlah Stok per Kategori
     $stokByCategory = Product::select('category_id', \DB::raw('sum(stock) as total'))
         ->groupBy('category_id')
         ->get();
     $dataStokChart['categories'] = $stokByCategory->pluck('category_id');
     $dataStokChart['data'] = $stokByCategory->pluck('total');

      // Mengirim data ke tampilan
    return view('pages.dashboard', compact('totalProducts', 'totalCategories', 'totalStock', 'dataColumnChart', 'dataPieChart', 'dataStokChart'));
}

public function showProductForms()
{
    // Mengambil data produk beserta relasi kategori
    $products = Product::with('category')->get();

    return view('forms.forms', compact('products'));
}


}
