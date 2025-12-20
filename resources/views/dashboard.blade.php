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
     role anda adalah {{ $user->role_name }}
    <br>
    <br>
    @if(session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif
    <br>
    <a href="/api/users">Data Users</a>
    <a href="/artikel">halaman artikel</a>
    
    <!-- tombol logout dengan request method post -->
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit">Logout</button>   
    </form> 
</body>
</html>