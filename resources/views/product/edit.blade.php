<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
</head>
<body>
    <form action="/product/update/{{$detail->id}}" method="post">
        @csrf
        <label for="">Nama Produk</label>
        <input type="text" name="nama_produk" value = "{{$detail->nama_produk}}" required>

        <label for="">Stok</label>
        <input type="number" name="stok" value = "{{$detail->stok}}" required>

        <label for="">Harga</label>
        <input type="number" name="harga" value = "{{$detail->harga}}" required>

        <label for="">Brand</label>
        <select name="brand_id" id="brand_id">
            @foreach ($brand as $item) 
            <option value="{{$item->id}}" {{($detail->brand_id == $item->id) ? 'Selected' : ''}}>{{$item->nama_brand}}</option>
            @endforeach
        </select>

        <label for="">Gudang</label>
        <select name="gudang_id" id="gudang_id">
            @foreach ($gudang as $item) 
            <option value="{{$item->id}}" {{($detail->gudang_id == $item->id) ? 'Selected' : ''}}>{{$item->nama_gudang}}</option>
            @endforeach
        </select>
        <button type="submit">Submit</button>
    </form>
</body>
</html>