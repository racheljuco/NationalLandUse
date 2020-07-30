@extends('layouts.master')

@section('content')

    <div class="card">

        <div class="card-header">
            
            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('area_under_irrigations.create') }}</h3>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.area_under_irrigation.index') }}" class="btn btn-primary" title="{{ trans('area_under_irrigations.show_all') }}">
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

            <form method="POST" action="{{ route('admin.area_under_irrigation.store') }}" accept-charset="UTF-8" id="create_area_under_irrigation_form" name="create_area_under_irrigation_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('admin.area_under_irrigations.form', [
                                        'areaUnderIrrigation' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('area_under_irrigations.add') }}">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


