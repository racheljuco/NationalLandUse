@extends('layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">LUP Water Resources Data</h1>
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
          
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-database"></i></span>
           
              <div class="info-box-content">
              <a href="{{ route('admin.livestock.index') }}">
                <span class="info-box-text">Resource Types</span>
                </a>
                <span class="info-box-number">
                   
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
          
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-database"></i></span>
           
              <div class="info-box-content">
              <a href="{{ route('admin.land_use_plan_livestock.index') }}">
                <span class="info-box-text">Village Livestocks</span>
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
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-database"></i></span>

              <div class="info-box-content">
              <a href="{{ route('admin.livestock_projection.index') }}">
              <span class="info-box-text">Livestock Projection</span>
                </a>
               
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-database"></i></span>

              <div class="info-box-content">
              <a href="{{ route('admin.livestock_keeper.index') }}">
              <span class="info-box-text">Livestock Keepers</span>
                </a>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-database"></i></span>

              <div class="info-box-content">
              <a href="{{ route('admin.livestock_product.index') }}">
              <span class="info-box-text">Livestock Products</span>
                </a>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->


          
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-database"></i></span>

              <div class="info-box-content">
              <a href="{{ route('admin.cattle_distribution.index') }}">
              <span class="info-box-text">Cattle Distribution</span>
                </a>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
         

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-database"></i></span>

              <div class="info-box-content">
              <a href="{{ route('admin.cattle_keeper.index') }}">
              <span class="info-box-text">Cattle Keepers</span>
                </a>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-database"></i></span>

              <div class="info-box-content">
              <a href="{{ route('admin.grazzing_land.index') }}">
              
              <span class="info-box-text">Estimated Grazing Land</span>
                </a>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-database"></i></span>

              <div class="info-box-content">
              <a href="{{ route('admin.veterinary_facilityservice.index') }}">
              <span class="info-box-text">Veterian Facilities & Service</span>
                </a>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
          
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-database"></i></span>
           
              <div class="info-box-content">
              <a href="{{ route('admin.livestock_market.index') }}">
                <span class="info-box-text">Livestock Markets</span>
                </a>
                <span class="info-box-number">
                   
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
           
        </div>
        <!-- /.row -->

<hr>
@endsection