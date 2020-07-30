@extends('layouts.master')

@section('content')

    <div class="card">
  
        <div class="card-header">

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ !empty($title) ? $title : 'Cultivated Land Yield' }}</h3>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('admin.cultivated_land_yield.index') }}" class="btn btn-primary" title="{{ trans('cultivated_land_yields.show_all') }}">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                </a>

                <a href="{{ route('admin.cultivated_land_yield.create') }}" class="btn btn-success" title="{{ trans('cultivated_land_yields.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
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

            <form method="POST" action="{{ route('admin.cultivated_land_yield.update', $cultivatedLandYield->id) }}" id="edit_cultivated_land_yield_form" name="edit_cultivated_land_yield_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('admin.cultivated_land_yield.form', [
                                        'cultivatedLandYield' => $cultivatedLandYield,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('cultivated_land_yields.update') }}">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection