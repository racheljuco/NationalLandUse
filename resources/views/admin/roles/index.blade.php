@extends('layouts.master')

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
                <h3><i class="fa fa-user"></i>&nbsp;All {{ trans('roles.model_plural') }} ({{ $roles }} {{Str::plural('Role', $roles )}} )</h3>
                <div class="ml-auto">
                <a href="{{ route('admin.role.create') }}" class="btn btn-outline-primary" title="{{ trans('roles.create') }}" style="text-decoration: none"><i class="fa fa-user-plus" aria-hidden="true"></i>{{ trans('roles.create') }}</a>
                </div>
            </div>
        </div>
      <!-- end card-header -->

        <!-- card body-->
        <div class="card-body">
            @if( $roles  == 0)
                    <div class="panel-body text-center">
                        <h4>{{ trans('roles.none_available') }}</h4>
                    </div>
            @endif
                <table id="datatable" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ trans('roles.name') }}</th>
                                    <th>{{ trans('roles.guard_name') }}</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            </tbody>
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
      ajax: '{!! route('admin.role.data') !!}',
      columns: [
          {data: 'name'},
          {data: 'guard_name'},
          {data: 'action', orderable: false, searchable: false}
      ]
  });
</script>

@endsection


@endsection
