
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
<title>Data Blog | Starter </title>
@include('tamplate.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
<!-- Navbar -->
  @include('tamplate.Navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('tamplate.Sidebar-left')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Hello</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Data Blog</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
     <h3>Halaman Data Blog</h3>
      <!-- Main content -->
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>Nama</th>
                      <th style="width :50%">
                      <center> Aksi </center>
                      </th> 
                    </tr>
                  @foreach ($varHuruf as $isinya)
                    <tr>
                    <td>{{$isinya}}</td>
                    <td>
                    <a href="{{$isinya}}">
                    <i class="fas fa-eye red"></i> VIEW  | </i>
                    <a href="{{$isinya}}">
                    <i class="fas fa-edit pink">EDIT | </i>
                    <a href="{{$isinya}}">
                    <i class="fas fa-trash teal">DELETE</i>
                    </a>
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
             
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0
    </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('tamplate.footer')
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
@include('tamplate.script')

</body>
</html>
