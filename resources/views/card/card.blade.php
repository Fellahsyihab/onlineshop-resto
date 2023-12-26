<!-- card.blade.php -->

@extends('layouts.main')

@section('konten')
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                @include('card.product_card', ['product' => $product])
            </div>
        @endforeach
    </div>
@endsection
