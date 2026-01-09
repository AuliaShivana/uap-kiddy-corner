@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>🛒 Keranjang Belanja</h3>

    @if(empty($cart))
        <p>Keranjang masih kosong 😢</p>
        <a href="/products" class="btn btn-primary">Kembali Belanja</a>
    @else
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $item)
                    @php
                        $subtotal = $item['price'] * $item['qty'];
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['qty'] }}</td>
                        <td>Rp {{ number_format($item['price']) }}</td>
                        <td>Rp {{ number_format($subtotal) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h5>Total: <strong>Rp {{ number_format($total) }}</strong></h5>

        <form method="POST" action="/cart/checkout">
            @csrf
            <button class="btn btn-success mt-3">💳 Checkout</button>
        </form>
    @endif
</div>
@endsection
