@extends('layouts.master')

@section('title',isset($role->name) ? $role->name : 'Role')

@section('content')
<!-- card-header -->

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card card-default">

                <!-- card-header -->
                <div class="card-header">
                <div class="d-flex align-items-center">

                <h3><i class="fa fa-user"></i> Details for {{$role->name}}</h3>

                        <div class="ml-auto">
                        
                                <form method="POST" action="{!! route('admin.role.destroy', $role->id) !!}" accept-charset="UTF-8">
                                    <input name="_method" value="DELETE" type="hidden">
                                    {{ csrf_field() }}
                                        <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('admin.role.index') }}" class="btn btn-primary" title="{{ trans('roles.show_all') }}">
                                      <span class="fa fa-th-list" aria-hidden="true"></span>
                                    </a>

                                    <a href="{{ route('admin.role.create') }}" class="btn btn-success" title="{{ trans('roles.create') }}">
                                        <span class="fa fa-plus" aria-hidden="true"></span>
                                    </a>
                                    
                                    <a href="{{ route('admin.role.edit', $role->id ) }}" class="btn btn-primary" title="{{ trans('roles.edit') }}">
                                        <span class="fa fa-edit" aria-hidden="true"></span>
                                    </a>

                                    <button type="submit" class="btn btn-danger" title="{{ trans('roles.delete') }}" onclick="return confirm(&quot;{{ trans('roles.confirm_delete') }}?&quot;)">
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
                            <dt>{{ trans('roles.name') }}</dt>
                            <dd>{{ $role->name }}</dd>
                            <dt>{{ trans('roles.guard_name') }}</dt>
                            <dd>{{ $role->guard_name }}</dd>
                            <dt>{{ trans('roles.created_at') }}</dt>
                            <dd>{{ $role->created_at }}</dd>
                            <dt>{{ trans('roles.updated_at') }}</dt>
                            <dd>{{ $role->updated_at }}</dd>

                        </dl>
                    </div>

                    <div class="row ml-3  mr-3">
                            @foreach($permissions as $perm)
                                <?php
                                    $per_found = null;

                                    if( isset($role) ) {
                                        $per_found = $role->hasPermissionTo($perm->name);
                                    }

                                    if( isset($user)) {
                                        $per_found = $user->hasDirectPermission($perm->name);
                                    }
                                ?>

                                <div class="col-md-3">
                                    <div class="checkbox">
                                        <label class="{{ str_contains($perm->name, 'delete') ? 'text-danger' : '' }}">
                                        <input   disabled   <?php   echo ($per_found==null)? '':'checked'; ?> name="permissions[]" type="checkbox" value="{{$perm->name}}"> {{$perm->name}}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

               <!-- end card body-->
               </div>
                <!-- card -->
            </div>
            <!-- col -->
        </div>
        <!-- row -->
@endsection