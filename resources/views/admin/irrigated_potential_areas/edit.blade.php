@extends('layouts.master')

@section('content')

    <div class="card">
  
        <div class="card-header">

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ !empty($title) ? $title : 'Irrigated Potential Area' }}</h3>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('admin.irrigated_potential_area.index') }}" class="btn btn-primary" title="{{ trans('irrigated_potential_areas.show_all') }}">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                </a>

                <a href="{{ route('admin.irrigated_potential_area.create') }}" class="btn btn-success" title="{{ trans('irrigated_potential_areas.create') }}">
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

            <form method="POST" action="{{ route('admin.irrigated_potential_area.update', $irrigatedPotentialArea->id) }}" id="edit_irrigated_potential_area_form" name="edit_irrigated_potential_area_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('admin.irrigated_potential_areas.form', [
                                        'irrigatedPotentialArea' => $irrigatedPotentialArea,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('irrigated_potential_areas.update') }}">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection