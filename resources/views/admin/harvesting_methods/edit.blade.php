@extends('layouts.master')

@section('content')

    <div class="card">
  
        <div class="card-header">

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ !empty($harvestingMethod->name) ? $harvestingMethod->name : 'Harvesting Method' }}</h3>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('admin.harvesting_method.index') }}" class="btn btn-primary" title="{{ trans('harvesting_methods.show_all') }}">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                </a>

                <a href="{{ route('admin.harvesting_method.create') }}" class="btn btn-success" title="{{ trans('harvesting_methods.create') }}">
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

            <form method="POST" action="{{ route('admin.harvesting_method.update', $harvestingMethod->id) }}" id="edit_harvesting_method_form" name="edit_harvesting_method_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('admin.harvesting_methods.form', [
                                        'harvestingMethod' => $harvestingMethod,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('harvesting_methods.update') }}">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection