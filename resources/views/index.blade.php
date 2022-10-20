<html>
    <head>
        <title>List Produk</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <style>
            /* table, th, td {
                border: 1px solid black;
            } */
            th:nth-child(2), td:nth-child(2) {
                min-width:50px;
                width: max-content;
            }
            th, td:nth-child(3) {
                text-align: center;
            }
            td:nth-child(2) {
                text-align: right;
            }
        </style>
    </head>
    <body class="">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
        </svg>

        <div class="container">
            <header class="d-flex justify-content-center py-3 mb-4 border-bottom">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="/" class="nav-link">"/"</a></li>
                    <li class="nav-item"><a href="/hello" class="nav-link">Hello</a></li>
                    <li class="nav-item"><a href="/produk" class="nav-link active">Products</a></li>
                    <li class="nav-item"><a href="/produk/create/" class="nav-link">Add Products</a></li>
                </ul>
            </header>
        </div>

        <div class="container">
            @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:" style="width: 1em; height: 1em;">
                    <use xlink:href="#check-circle-fill"/>
                </svg>
                <div>{{ Session::pull('message') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <table class="table table-bordered">
                @csrf
                <thead class="table-dark">
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($list as $item)
                        <tr>
                            <td>{{ $item->nama_produk }}</td>
                            <td>{{ $item->stok }}</td>
                            <td><a href="/produk/edit/{{$item->id}}" onclick="" class="btn btn-primary">Edit</a>
                                |
                                <a onclick="cod('{{$item->id}}')" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script>
            function cod(id) {
                Swal.fire({
                    title: "Hapus item?",
                    text: "Item tidak dapat dikembalikan setelah dihapus",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ye"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire (
                            "Deleted!",
                            "Item telah dihapus.",
                            "Success"
                        );
                        document.location = `/produk/delete/${id}`;
                    }
                })
            }
        </script>
        <script src="sweetalert2.all.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>