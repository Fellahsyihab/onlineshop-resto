<!-- product_card.blade.php -->

<div class="card">
    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="width: 100%; height: 200px; object-fit: cover;">
    <div class="card-body">
        <h5 class="card-title">{{ $product->name }}</h5>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text"><strong>Price:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        <p class="card-text"><strong>Stock:</strong> {{ $product->stock }}</p>

        <!-- Tombol Add to Cart -->
        <button class="btn btn-sm btn-outline-primary mt-2">Add to Cart</button>
    </div>
</div>
