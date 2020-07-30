@extends('layouts.master')

@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
    <h1 class="m-0 text-dark">NLUIS</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">{{ Breadcrumbs::render('admin.user.create') }}</a></li>
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
        <h4>  <i class="fa fa-user"></i>&nbsp;Add New {{ !empty($user->name) ? $user->name : 'User' }}</h4>
        <div class="ml-auto">
          <div class="btn-group btn-group-sm" role="group">
            <a href="{{ route('admin.user.index') }}" class="btn btn-primary pull-right" title="{{ trans('users.show_all') }}">
                <span class="fa fa-th-list" aria-hidden="true"></span>
            </a>
          </div>
        </div>
   </div>
</div>
<!-- end card-header -->


<div class="card-body">

  
        <form method="POST" action="{{ route('admin.user.store') }}" accept-charset="UTF-8" id="create_user_form" name="create_user_form" class="form-horizontal">
        {{ csrf_field() }}
        @include ('admin.users.form', [
                                    'user' => null,
                                    'roles'=>$roles,
                                    'password_required'=>'true',
                                    ])

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input class="btn btn-primary" type="submit" value="{{ trans('users.add') }}">
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
