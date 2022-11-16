<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gudang</title>
</head>
<body>
    <form action="/gudang/update/{{$detail->id}}" method="post">
        @csrf
        <label for="">Nama Gudang</label>
        <input type="text" name="nama_gudang" value = "{{$detail->nama_gudang}}" required>

        <label for="">Alamat Gudang</label>
        <input type="text" name="alamat_gudang" value = "{{$detail->alamat_gudang}}" required>

        <button type="submit">Submit</button>
    </form>
</body>
</html>