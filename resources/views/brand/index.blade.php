<!DOCTYPE html>
<html lang="en">

<head>
    <title>MyProduct - Brand</title>
    @include('layout.head');
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">MyProduct</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        
        <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block ps-2">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/product">
              <i class="bi bi-circle"></i><span>Product</span>
            </a>
          </li>
          <li>
            <a href="/brand">
              <i class="bi bi-circle"></i><span>Brand</span>
            </a>
          </li>
          <li>
            <a href="/gudang">
              <i class="bi bi-circle"></i><span>Gudang</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

    
      <li class="nav-heading">Setting</li>

      <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
          <i class="bi bi-box-arrow-in-right"></i>
                <span>Logout</span>
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
      </li><!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

  <!-- Page title -->
    <div class="pagetitle">
      <h1>Brand</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item">Data</li>
          <li class="breadcrumb-item active">Brand</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
        <!-- Button trigger Add modal -->
        <button type="button" id="CreateNewBrand" class="btn btn-primary mb-4" data-toggle="modal" data-target="#addModal">
        Add Brand
        </button>

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">List Brand</h5>
                <table id="data-table" class="table rounded table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Brand</th>
                            <th>Total Produk</th>
                            <th>Total Gudang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
          </div>

        <!-- Add Modal -->
        <div class="modal fade" id="ajaxModel" tabindex="-1" role="dialog" aria-labelledby="ajaxModelLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ajaxModelLabel">Add Brand</h5>
                        <button type="button" class="close" id="closeSilang" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="brandForm" name="brandForm">
                        <div class="modal-body">
                          <input type="hidden" name="brand_id" id="brand_id">
                            <div class="form-group"> 
                                <label for="">Nama Brand</label>
                                <input type="text" name="nama_brand" id="nama_brand" class="form-control" required>
                            </div>
            
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="closeButton" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="saveBtn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>          
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>MyProduct</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('layout.script');

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    $(function () {
        $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

      var table = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/brand",
        columns: [
            {data: 'DT_RowIndex'},
            {data: 'nama_brand'},
            {data: 'product_count'},
            {data: 'gudang_count'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
      });

      $('#CreateNewBrand').click(function () {
        $('#brand_id').val('');
        $('#brandForm').trigger("reset");
        $('#ajaxModel').modal('show');
      });

      $('body').on('click', '.editBrand', function () {
      var brand_id = $(this).data('id');
      $.get("/brand/edit/" + brand_id, function (list) {
          $('#ajaxModel').modal('show');
          $('#product_id').val(list.id);
          $('#nama_brand').val(list.nama_brand);
        })
      });

      $('#saveBtn').click(function (e) {
        e.preventDefault();
      
        Swal.fire({
        title: 'Do you want to save the changes?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Save',
        denyButtonText: `Don't save`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */

        if (result.isConfirmed) {
          Swal.fire('Saved!', '', 'success')
          $.ajax({
          data: $('#brandForm').serialize(),
          url: "/brand",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              $('#brandForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
          }
        });
        } else if (result.isDenied) {
          Swal.fire('Changes are not saved', '', 'info')
          $('#ajaxModel').modal('hide');

        }
      })
      });

      $('#closeButton').click(function (e){
        $('#ajaxModel').modal('hide');
      });

      $('#closeSilang').click(function (e){
        $('#ajaxModel').modal('hide');
      });

      $('body').on('click', '.deleteBrand', function () {
     
     var brand_id = $(this).data("id");
     Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        $.ajax({
        type: "GET",
        url: "/brand/delete/"+brand_id,
        success: function (data) {
            table.draw();
        },
        error: function (data) {
            console.log('Error:', data);
        }
      });
        }
      })
     
 });

    });
  </script>

</body>

</html>