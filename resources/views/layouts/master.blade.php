<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title> NLUIS </title>
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    @yield("css")

</head>

<!-- AdminLTE Template Layout -->
<!-- <body class="hold-transition sidebar-mini layout-footer-fixed"> -->
<!-- <body class="hold-transition sidebar-mini layout-boxed"> -->
<!-- <body class="hold-transition sidebar-mini sidebar-collapse"> -->
<!-- <body class="hold-transition sidebar-collapse layout-top-nav"> -->
<!-- <body class="hold-transition layout-top-nav"> -->
<!-- <body class="hold-transition sidebar-mini layout-navbar-fixed"> -->
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

    @include("layouts/partials/_navbar")

        @include("layouts/partials/_leftsidebar")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      
         @yield('breadcrumb')

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
  
          <!-- content to be displayed here -->
          @yield("content")

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->           
        
        @include("layouts/partials/_rightsidebar")
        @include("layouts/partials/_footer")

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


<!-- App js -->
<script src="{{ asset('js/app.js') }}"></script>

 @yield("js")
 @stack('script')


</body>
</html>
