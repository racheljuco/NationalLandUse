@extends('layouts.master')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
    <div class="card card-default">


 <!-- card-header -->
        <div class="card-header">

            <div class="d-flex align-items-center">
            <h3><i class="fa fa-user"></i> &nbsp;All {{ trans('permissions.model_plural') }} ({{ $permissions }} {{ Str::plural('Permission',$permissions)}} )</h3>
                <div class="ml-auto">
                <a href="{{ route('admin.permission.create') }}" class="btn btn-outline-primary pull-right"  title="{{ trans('permissions.create') }}" style="text-decoration: none"><i class="fa fa-user-plus" aria-hidden="true"></i>{{ trans('permissions.create') }}</a>
                </div>
            </div>
        </div>
    <!-- end card-header -->


<!-- card body-->
<div class="card-body">
    @if($permissions == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('permissions.none_available') }}</h4>
            </div>
    @endif
        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ trans('permissions.name') }}</th>
                            <th>{{ trans('permissions.guard_name') }}</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                </table>

                  </div>
                 <!-- end card body-->
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
      ajax: '{!! route('admin.permission.data') !!}',
      columns: [
          {data: 'name'},
          {data: 'guard_name'},
          {data: 'action', orderable: false, searchable: false}
      ]
  });
</script>

@endsection


@endsection
