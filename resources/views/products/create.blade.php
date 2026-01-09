@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">🎀 Tambah Produk</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="/products" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-2">
            <label>Nama Produk</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Harga</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Stok</label>
            <input type="number" name="stock" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Category ID</label>
            <input type="number" name="category_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Gambar Produk</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-pink btn-warning">
            💾 Simpan Produk
        </button>
    </form>
</div>
@endsection
