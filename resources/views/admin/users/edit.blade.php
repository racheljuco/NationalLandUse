@extends('layouts.master')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
    <h1 class="m-0 text-dark">NLUIS</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">{{ Breadcrumbs::render('admin.user.edit',$user) }}</a></li>
    </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection


@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card card-default">
        @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

                <!-- card-header -->
                <div class="card-header">

                    <div class="d-flex align-items-center">
                        <h3><i class="fa fa-user"></i>{{ !empty($user->name) ? $user->name : 'User' }}</h3>
                        <div class="ml-auto">
                          <div class="btn-group btn-group-sm" role="group">
                            <a href="{{ route('admin.user.index') }}" class="btn btn-primary" title="{{ trans('users.show_all') }}">
                                 <span class="fa fa-th-list" aria-hidden="true"></span>
                             </a>

                             <a href="{{ route('admin.user.create') }}" class="btn btn-success" title="{{ trans('users.create') }}">
                                 <span class="fa fa-plus" aria-hidden="true"></span>
                             </a>
                          </div>
                        </div>

                    </div>
                    </div>
                    <!-- end card-header -->

                        <!-- card body-->
                        <div class="card-body">

                        

                                    <form method="POST" action="{{ route('admin.user.update', $user->id) }}" id="edit_user_form" name="edit_user_form" accept-charset="UTF-8" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="PUT">
                                    @include ('admin.users.form', [
                                                                'user' => $user,
                                                                'roles'=>$roles,
                                                                'password_required'=>'false',
                                                            ])

                                        <div class="form-group">
                                            <div class="col-md-offset-2 col-md-10">
                                                <input class="btn btn-primary" type="submit" value="{{ trans('users.update') }}">
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                    <!-- end card body-->
                            </div>
                        <!-- card -->
                    </div>
                    <!-- col -->
                </div>
                <!-- row -->

@endsection
