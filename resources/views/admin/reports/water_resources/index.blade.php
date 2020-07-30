@extends('layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Water Resources Reports</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <!-- <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard v2</li>
        </ol> -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Info boxes -->
<div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
          
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-pdf"></i></span>
           
              <div class="info-box-content">
              <a href="{{ route('admin.livestock.report.create') }}">
                <span class="info-box-text">Water Resources</span>
                </a>
                <span class="info-box-number">
                   
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-file-pdf"></i></span>

              <div class="info-box-content">
              <a href="{{ route('admin.livestock_market.report.create') }}">
              <span class="info-box-text">Map</span>
                </a>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div> 

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-file-pdf"></i></span>

              <div class="info-box-content">
              <a href="{{ route('admin.livestock_keeper.report.create') }}">
              <span class="info-box-text">Shape Files</span>
                </a>
               
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
     <hr>

@endsection