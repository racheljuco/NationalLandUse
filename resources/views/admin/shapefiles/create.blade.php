@extends('layouts.master')

@section('content')

    <div class="card">

        <div class="card-header">
            
            <!-- <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('shape_files.create') }}</h3> -->
            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;Upload Shape Files</h3>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.shape_file.index') }}" class="btn btn-primary" title="{{ trans('shape_files.show_all') }}">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                </a>
            </div>

        </div>

        <div class="card-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('admin.shape_file.store') }}" accept-charset="UTF-8" id="create_shape_file_form" name="create_shape_file_form" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include ('admin.shapefiles.form', [
                                        'shapeFile' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('shape_files.add') }}">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


