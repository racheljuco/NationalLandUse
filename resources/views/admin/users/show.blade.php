@extends('layouts.master')

@section('title',isset($user->name) ? $user->name : 'User')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
    <h1 class="m-0 text-dark">NLUIS</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">{{ Breadcrumbs::render('admin.user.show',$user) }}</a></li>
    </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection


@section('content')

<!-- card-header -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card card-default">

                <!-- card-header -->
                <div class="card-header">
                <div class="d-flex align-items-center">

                <h3><i class="fa fa-user"></i> Details for {{$user->name}}</h3>

                        <div class="ml-auto">


                            <form method="POST" action="{!! route('admin.user.destroy', $user->id) !!}" accept-charset="UTF-8">
                            <input name="_method" value="DELETE" type="hidden">
                            {{ csrf_field() }}
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('admin.user.index') }}" class="btn btn-primary" title="{{ trans('users.show_all') }}">
                                        <span class="fa fa-th-list" aria-hidden="true"></span>
                                    </a>

                                    <a href="{{ route('admin.user.create') }}" class="btn btn-success" title="{{ trans('users.create') }}">
                                        <span class="fa fa-plus" aria-hidden="true"></span>
                                    </a>

                                    <a href="{{ route('admin.user.edit', $user->id ) }}" class="btn btn-primary" title="{{ trans('users.edit') }}">
                                        <span class="fa fa-edit" aria-hidden="true"></span>
                                    </a>

                                    <button type="submit" class="btn btn-danger" title="{{ trans('users.delete') }}" onclick="return confirm(&quot;{{ trans('users.confirm_delete') }}?&quot;)">
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
                        <dt>First Name</dt>
                        <dd>{{ $user->first_name }}</dd>
                        <dt>Middle Name</dt>
                        <dd>{{ $user->middle_name }}</dd>
                        <dt>Last Name</dt>
                        <dd>{{ $user->last_name }}</dd>
                        <dt>Profession</dt>
                        <dd>{{ $user->proffession }}</dd>
                        <dt>Designation</dt>
                        <dd>{{ $user->designation }}</dd>
                        <dt>Organisation</dt>
                        <dd>{{ optional($user->Organisation)->name }}</dd>


                        <dt>{{ trans('users.name') }}</dt>
                        <dd>{{ $user->name }}</dd>
                        <dt>{{ trans('users.email') }}</dt>
                        <dd>{{ $user->email }}</dd>
                        <dt>{{ trans('users.password') }}</dt>
                        <dd>{{ $user->password }}</dd>
                        <dt>{{ trans('users.remember_token') }}</dt>
                        <dd>{{ $user->remember_token }}</dd>
                        <dt>{{ trans('users.created_at') }}</dt>
                        <dd>{{ $user->created_at }}</dd>
                        <dt>{{ trans('users.updated_at') }}</dt>
                        <dd>{{ $user->updated_at }}</dd>

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
