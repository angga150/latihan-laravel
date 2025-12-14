<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="/dashboard">back to dashboard</a>
<!-- buat artikel baru -->
    <form action="{{ route('artikel.store') }}" method="post">
        <h2>tambah artikel baru</h2>
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="content">Content:</label>
        <textarea id="content" name="content" required></textarea>
        <br>
        <button type="submit">Submit</button>
    </form>
    <hr>
    
    <!-- nampilin data artikel dari database yang dikirim controller -->
    @foreach ($artikel as $row)
    <form action="{{ route('artikel.destroy', $row->id) }}" method="post">
        @csrf
        @method('DELETE')
        <h2>{{ $row->title }}</h2>
        <p>{{ $row->content }}</p>
        @can('update', $row)
        <a href="{{ route('artikel.edit', $row->id) }}" style="margin-right: 10px; text-decoration: underline; color: blue;">edit</a>
        <button type="submit">Hapus</button>
        @endcan
    </form>
    @endforeach
<br>
</body>
</html>