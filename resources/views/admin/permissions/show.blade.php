@extends('layouts.master')

@section('title',isset($permission->name) ? $permission->name : 'Permission')

@section('content')

<!-- card-header -->

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card card-default">

            <!-- card-header -->
            <div class="card-header">
            <div class="d-flex align-items-center">

                <h3><i class="fa fa-user"></i> Details for {{$permission->name}}</h3>

                        <div class="ml-auto">

                 <form method="POST" action="{!! route('admin.permission.destroy', $permission->id) !!}" accept-charset="UTF-8">
                            <input name="_method" value="DELETE" type="hidden">
                            {{ csrf_field() }}
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('admin.permission.index') }}" class="btn btn-primary" title="{{ trans('permissions.show_all') }}">
                                    <span class="fa fa-th-list" aria-hidden="true"></span>
                                </a>

                                <a href="{{ route('admin.permission.create') }}" class="btn btn-success" title="{{ trans('permissions.create') }}">
                                    <span class="fa fa-plus" aria-hidden="true"></span>
                                </a>

                                <a href="{{ route('admin.permission.edit', $permission->id ) }}" class="btn btn-primary" title="{{ trans('permissions.edit') }}">
                                    <span class="fa fa-edit" aria-hidden="true"></span>
                                </a>

                                <button type="submit" class="btn btn-danger" title="{{ trans('permissions.delete') }}" onclick="return confirm(&quot;{{ trans('permissions.confirm_delete') }}?&quot;)">
                                    <span class="fa fa-trash" aria-hidden="true"></span>
                                </button>
                            </div>
                      </form>

                        </div>
                    </div>
                 </div>
            <!-- end card-header -->





            <!-- card body-->
            <div class="card-body">
                    <dl class="dl-holizontal">
                        <dt>{{ trans('permissions.name') }}</dt>
                        <dd>{{ $permission->name }}</dd>
                        <dt>{{ trans('permissions.guard_name') }}</dt>
                        <dd>{{ $permission->guard_name }}</dd>
                        <dt>{{ trans('permissions.created_at') }}</dt>
                        <dd>{{ $permission->created_at }}</dd>
                        <dt>{{ trans('permissions.updated_at') }}</dt>
                        <dd>{{ $permission->updated_at }}</dd>

                    </dl>
            </div>
        <!-- end card body-->
        </div>
    <!-- card -->
    </div>
<!-- col -->
</div>
<!-- row -->
        @endsection
