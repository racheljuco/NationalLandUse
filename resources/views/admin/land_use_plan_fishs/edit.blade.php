@extends('layouts.master')

@section('content')

    <div class="card">
  
        <div class="card-header">

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;Village/{{ !empty($title) ? $title : 'Land Use Plan Fish' }}</h3>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('admin.land_use_plan_fish.index') }}" class="btn btn-primary" title="{{ trans('land_use_plan_fishs.show_all') }}">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                </a>

                <a href="{{ route('admin.land_use_plan_fish.create') }}" class="btn btn-success" title="{{ trans('land_use_plan_fishs.create') }}">
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

            <form method="POST" action="{{ route('admin.land_use_plan_fish.update', $landUsePlanFish->id) }}" id="edit_land_use_plan_fish_form" name="edit_land_use_plan_fish_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('admin.land_use_plan_fishs.form', [
                                        'landUsePlanFish' => $landUsePlanFish,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('land_use_plan_fishs.update') }}">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection