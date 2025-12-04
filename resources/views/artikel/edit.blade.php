<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>

    <!-- nampilin data artikel dari database yang dikirim controller -->
    <form action="{{ route('artikel.update', $artikel->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ $artikel->title }}" required>
        <br>
        <label for="content">Content:</label>
        <textarea id="content" name="content" required>{{ $artikel->content }}</textarea>
        <br>
        <button type="submit">Update</button>
    </form>

</body>
</html>