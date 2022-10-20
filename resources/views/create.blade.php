<html>
    <head>
        <title>index</title>
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
                    <li class="nav-item"><a href="/produk/create/" class="nav-link active">Add Products</a></li>
                </ul>
            </header>
        </div>

        <div class="cf container-sm border p-3 rounded m-auto">
            <form action="/produk" method="POST" class="">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" placeholder="Minyak kayu angin putih"/>
                </div>

                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" placeholder="12"/>
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-light" onclick="history.back()">Cancel</button>
                </div>
            </form>
        </div>
        <script src="sweetalert2.all.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
</html>