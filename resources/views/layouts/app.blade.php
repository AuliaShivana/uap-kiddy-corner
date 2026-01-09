<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kiddy Corner</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #fff5f8;
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background-color: #ff69b4;
        }

        footer {
            background-color: #ff69b4;
            color: white;
            padding: 15px;
            margin-top: 40px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand text-white" href="/">🍼 Kiddy Corner</a>
        <a href="/cart" class="btn btn-light btn-sm">🛒 Cart</a>
    </div>
</nav>

<div class="container my-4">
    @yield('content')
</div>

<footer class="text-center">
    © {{ date('Y') }} Kiddy Corner
</footer>

</body>
</html>
