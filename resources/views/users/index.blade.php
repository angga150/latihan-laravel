<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Users</title>
</head>
<body>
    <a href="/dashboard">back to dashboard</a>
    <a href="/auth/register">tambah user</a>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->role_name }}</td>
                <td>
                    <form action="{{ route('users.updateRole') }}" method="POST" style="display:inline;">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <select name="role_id" id="roles" required>
                            <option value="" hidden>Ganti Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                        @csrf
                        <button type="submit">Update</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>