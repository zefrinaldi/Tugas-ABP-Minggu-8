<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Produk</title>
</head>
<body>
    <a href="/produk/create">Add Produk</a>
    <table border="1">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $item)
                <tr>
                    <td>{{$item->nama_produk}}</td>
                    <td>{{$item->stok}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>