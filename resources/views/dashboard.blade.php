<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    selamat datang di dashboard! silakan kunjungi halaman
    <br>
    role anda adalah {{ auth()->user()->role }}
    <br>
    <br>
    <a href="/artikel">halaman artikel</a>
</body>
</html>