@extends('layouts.app')

@section('content')
<h3 class="text-center text-danger mb-4">
    ✨ Koleksi Mainan Anak ✨
</h3>

<div class="row">
    @forelse($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}"
                         class="card-img-top"
                         style="height:200px; object-fit:cover;">
                @endif

                <div class="card-body text-center">
                    <h5>🧸 {{ $product->name }}</h5>
                    <p>Rp {{ number_format($product->price) }}</p>
                    <p>Stok: {{ $product->stock }}</p>

                    <form method="POST" action="/cart/add/{{ $product->id }}">
                        @csrf
                        <button class="btn btn-warning btn-sm">
                            🛒 Beli
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p class="text-center">Belum ada produk</p>
    @endforelse
</div>
@endsection
