<!DOCTYPE html>
<html>
<head>
    <title>Tambah Product</title>
</head>
<body>

<h2>Tambah Product</h2>

{{-- Tampilkan error validasi --}}
@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

{{-- Tampilkan pesan sukses --}}
@if (session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form action="/product/store" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Category ID</label><br>
    <input type="number" name="category_id"><br><br>

    <label>Nama Product</label><br>
    <input type="text" name="name"><br><br>

    <label>Harga</label><br>
    <input type="number" name="price"><br><br>

    <label>Stock</label><br>
    <input type="number" name="stock"><br><br>

    <label>Gambar</label><br>
    <input type="file" name="image"><br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>
