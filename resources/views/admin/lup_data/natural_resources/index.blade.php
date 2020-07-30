@extends('layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">LUP Wildlife Data</h1>
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
              <a href="{{ route('admin.wildlife.index') }}">
                <span class="info-box-text">Wildlife Types</span>
                </a>
                <span class="info-box-number">
                   
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
         <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-database"></i></span>

              <div class="info-box-content">
              <a href="{{ route('admin.wildlife_conservation.index') }}">
              <span class="info-box-text">Wildlife conservations details </span>
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
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-database"></i></span>

              <div class="info-box-content">
              <a href="{{ route('admin.wildlife_corridor.index') }}">
              <span class="info-box-text">Wildlife Corridors</span>
                </a>
               
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
</div>
        <!-- /.row -->

<hr>
<hr>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">LUP Forestry Data</h1>
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
                <span class="info-box-text">Wildlife</span>
                </a>
                <span class="info-box-number">
                   
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
         <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-database"></i></span>

              <div class="info-box-content">
              <a href="{{ route('admin.livestock_keeper.index') }}">
              <span class="info-box-text">Forestry </span>
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
              <span class="info-box-text">Mining</span>
                </a>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-database"></i></span>

              <div class="info-box-content">
              <a href="{{ route('admin.livestock_projection.index') }}">
              <span class="info-box-text">Beek keeping</span>
                </a>
               
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
</div>
        <!-- /.row -->
<hr>
<hr>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">LUP Bee keeping Data</h1>
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
                <span class="info-box-text">Wildlife</span>
                </a>
                <span class="info-box-number">
                   
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
         <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-database"></i></span>

              <div class="info-box-content">
              <a href="{{ route('admin.livestock_keeper.index') }}">
              <span class="info-box-text">Forestry </span>
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
              <span class="info-box-text">Mining</span>
                </a>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-database"></i></span>

              <div class="info-box-content">
              <a href="{{ route('admin.livestock_projection.index') }}">
              <span class="info-box-text">Beek keeping</span>
                </a>
               
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
</div>
<hr>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">LUP Minerals and Mining Data</h1>
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
              <a href="{{ route('admin.mineral.index') }}">
                <span class="info-box-text">Mineral types</span>
                </a>
                <span class="info-box-number">
                   
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
         <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-database"></i></span>

              <div class="info-box-content">
              <a href="{{ route('admin.mineral_detail.index') }}">
              <span class="info-box-text">Mineral activities </span>
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
              <span class="info-box-text">Mining</span>
                </a>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-database"></i></span>

              <div class="info-box-content">
              <a href="{{ route('admin.livestock_projection.index') }}">
              <span class="info-box-text">Beek keeping</span>
                </a>
               
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
</div>
        <!-- /.row -->
<hr>
<hr>
<!-- Content Header (Page header) -->

        <!-- /.row -->

@endsection