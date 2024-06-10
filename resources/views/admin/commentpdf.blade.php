<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }

        @page {
            size: A4;
            margin: 20mm;
        }
    </style>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Email</th>
                <th>Komentar</th>
                <th>Waktu Komentar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->user->email }}</td>
                    <td>{{ $comment->content }}</td>
                    <td>{{ $comment->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
