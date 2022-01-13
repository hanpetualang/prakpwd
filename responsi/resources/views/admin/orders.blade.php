<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Ecommerce</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Administrator</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex text-end text-light">Navigation</div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/home') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('orderList') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Orders</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Log Out
                <span class="right badge badge-danger">!</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Orders</h1>
            
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid card-body">
            <table class="table table-bordered bg-light">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Email</th>
                    {{-- <th scope="col">Nama</th> --}}
                    <th scope="col">Tipe</th>
                    <th scope="col">Harga</th>
                    <th scope="col"></th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    {{-- {{ dd($order->all()) }} --}}
                  @foreach ($order as $item)                      
                  <tr>
                    <td>{{ $item->id_order }}</td>
                    <td>{{ $item->email }}</td>
                    {{-- <td>{{ $item->users }}</td> --}}
                    <td>{{ $item->product->harga }}</td>
                    <td>{{ $item->product->ukuran }}</td>
                    <td><img width="40px" height="40px" src="{{ asset('img/'.$item->product->img) }}" alt="gambar"></td>
                    <td>
                      <a style="color: red" href="{{ url('delete-order',$item->id_order) }}"><i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </section>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
