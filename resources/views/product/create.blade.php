<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
</head>
<body>
    <form action="/product/store" method="post">
        @csrf
        <label for="">Nama Produk</label>
        <input type="text" name="nama_produk" required>

        <label for="">Stok Produk</label>
        <input type="number" name="stok" required>

        <label for="">Harga</label>
        <input type="number" name="harga" required>

        <label for="">Brand</label>
        <select name="brand_id" id="">
        @foreach($brand as $item)    
        <option value="{{$item->id}}">{{$item->nama_brand}}</option>
        @endforeach
        </select>

        <label for="">Gudang</label>
        <select name="gudang_id" id="">
        @foreach($gudang as $item)    
        <option value="{{$item->id}}">{{$item->nama_gudang}}</option>
        @endforeach
        </select>

        <button type="submit">Save</button>
    </form>
</body>
</html>