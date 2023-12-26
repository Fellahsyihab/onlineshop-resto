@extends('layouts.main')

@section('konten')
    <div class="container">
        <h2>Product List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Kode Produk</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td> <!-- Mengakses nama kategori melalui relasi -->
                        <td>{{ $product->product_code }}</td>
                        <td>{{ $product->active ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <!-- Tambahkan tombol atau tautan untuk aksi sesuai kebutuhan -->
                            <!-- Contoh tautan untuk mengedit produk -->
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
