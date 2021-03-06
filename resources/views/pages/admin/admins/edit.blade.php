<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('gt.gt11')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

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
      @include('gt.gt1')
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
            <h1 class="m-0">Add Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div style="width: 590px;
    height: 100%; margin: 50px auto;">
     <form method="post" action="{{route('admin-manager.update',$admin_manager)}}">
      @method('PUT')
      @csrf
         <div class="login-form-head">
             <h4>S???a Admin </h4>
             {{-- <p>Hello there, Sign up and Join with Us</p> --}}
         </div>
         
     <div class="login-form-body">
         <div class="form-group">
             <label for="example-text-input" class="col-form-label">H??? V?? T??n</label>
             <input class="form-control" name="name" value="{{ old('name', $admin_manager->name) }}"  id="example-text-input">
             <div style="color: red">
             
                 {{$errors->first('name')}}
              </div>
         </div>
         <div class="form-group">
             <label for="example-text-input" class="col-form-label">Birthday</label>
             <input class="form-control" type="date" name="dob" value="{{ old('dob', $admin_manager->dob) }}"  id="example-text-input" >
             <div style="color: red">
             
                 {{$errors->first('dob')}}
              </div>
         </div>
                
         <div class="form-group">
             <label for="example-text-input" class="col-form-label">Email</label>
             <input class="form-control" type="email" name="email" value="{{ old('email', $admin_manager->email) }}"  id="example-text-input">
             <div style="color: red">
             
                 {{$errors->first('email')}}
              </div>
         </div>
         <div class="form-group">
             <label for="example-text-input" class="col-form-label">Phone</label>
             <input class="form-control" type="phone" name="phone" value="{{ old('phone', $admin_manager->phone) }}"  id="example-text-input">
             <div style="color: red">
             
                 {{$errors->first('phone')}}
              </div>
         </div>
                
         <b class="text-muted mb-3 mt-4 d-block">Gi???i T??nh:</b>
         <div class="custom-control custom-radio custom-control-inline">
             <input type="radio" checked  name="gender" class="custom-control-input" value="1" 
             {{ old('gender') == '1' || $admin_manager->gender == '1' ? 'checked' : ''}}
             >
             <label class="custom-control-label" for="customRadio4">Nam</label>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
             <input type="radio"  name="gender" class="custom-control-input" value="0"
             {{ old('gender') == '0' || $admin_manager->gender == '0' ? 'checked' : ''}}
             >
             <label class="custom-control-label" for="customRadio5">N???</label>
         </div>
         
             <div style="color: red">
             {{$errors->first('gender')}}
             {{-- <i class="ti-mobile"></i> --}}
             </div>
         </div>
         <div class="form-group">
             <label for="example-text-input" class="col-form-label">Address</label>
             <input class="form-control" type="text" name="address" value="{{ old('address', $admin_manager->address) }}"  id="example-text-input">
             <div style="color: red">
             
                 {{$errors->first('address')}}
              </div>
         </div>
         
         
             
          
           
             <div class="btn-group">
                 <button id="form_submit" type="submit">
                    <i class="btn btn-primary">
                      s???a
                    </i>
                    </button>
                 
              </div>
         <br><br><br><br><br>
     </form>
 </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
</body>
</html>
