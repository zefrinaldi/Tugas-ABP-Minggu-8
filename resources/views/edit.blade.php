<!DOCTYPE html>
<html>
    <head>
        <title>Produk</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <style>
            .cf {
                max-width: 500px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <header class="d-flex justify-content-center py-3 mb-4 border-bottom">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="/" class="nav-link">"/"</a></li>
                    <li class="nav-item"><a href="/hello" class="nav-link">Hello</a></li>
                    <li class="nav-item"><a href="/produk" class="nav-link">Products</a></li>
                    <li class="nav-item"><a href="/produk/create/" class="nav-link">Add Products</a></li>
                </ul>
            </header>
        </div>

        <div class="cf container-sm border p-3 rounded">
            <form action="/produk/update/{{$detail->id}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="mb-3">Nama Produk</label>
                    <input type="text" name="nama_produk" value="{{$detail->nama_produk}}" class="form-control"/>
                </div>

                <div class="mb-3">
                    <label class="mb-3">Stok</label>
                    <input type="number" name="stok" value="{{$detail->stok}}" class="form-control"/>
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-light" onclick="history.back()">Cancel</button>
                </div>
            </form>
        </div>
        <script src="sweetalert2.all.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>