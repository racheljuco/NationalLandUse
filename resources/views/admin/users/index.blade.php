@extends('layouts.master')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
    <h1 class="m-0 text-dark">NLUIS</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">{{ Breadcrumbs::render('admin.user.index') }}</a></li>
    </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection


@section('content')
<div class="row justify-content-center">
<div class="col-md-12">
@if(Session::has('success_message'))
        <div class="alert alert-success">
            <i class=" fas fa-fw fa-check" aria-hidden="true"></i>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif



  <div class="card card-default">
  <!-- card-header -->
  <div class="card-header">
      <div class="d-flex align-items-center">
      <h3><i class="fa fa-user"></i>&nbsp;All {{ trans('users.model_plural') }} ({{ $users }} {{ Str::plural('User', $users )}} ) </h3>
          <div class="ml-auto">
          @can('add_user')
              <a href="{{ route('admin.user.create') }}" class="btn btn-outline-primary pull-right" title="{{ trans('users.create') }}" style="text-decoration: none"><i class="fa fa-user-plus" aria-hidden="true"></i>{{ trans('users.create') }}</a>
          @endcan
          </div>
      </div>
  </div>
<!-- end card-header -->

<!-- card body-->
<div class="card-body">
@if($users == 0)
      <div class="panel-body text-center">
          <h4>{{ trans('users.none_available') }}</h4>
      </div>
@endif
  <table id="datatable"  class="table table-bordered table-striped">
  <thead>
      <tr>
          <th>{{ trans('users.name') }}</th>
          <th>{{ trans('users.email') }}</th>
          <th>Action</th>
      </tr>
  </thead>

  </table>

    </div>
  <!-- card body-->
  </div>
  <!-- card -->
</div>
<!-- col -->
</div>
<!-- row -->
@section('js')
<!-- DataTables -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<script>
$('#datatable').DataTable({
    serverSide: true,
    processing: true,
    ajax: '{!! route('admin.user.data') !!}',
    columns: [
        {data: 'name'},
        {data: 'email'},
        {data: 'action', orderable: false, searchable: false}
    ]
});
</script>




@endsection


@endsection
