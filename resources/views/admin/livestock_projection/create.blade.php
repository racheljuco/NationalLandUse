@extends('layouts.master')

@section('content')

    <div class="card">

        <div class="card-header">
            
            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('livestock_projections.create') }}</h3>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.livestock_projection.index') }}" class="btn btn-primary" title="{{ trans('livestock_projections.show_all') }}">
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

            <form method="POST" action="{{ route('admin.livestock_projection.store') }}" accept-charset="UTF-8" id="create_livestock_projection_form" name="create_livestock_projection_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('admin.livestock_projection.form', [
                                        'livestockProjection' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('livestock_projections.add') }}">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


