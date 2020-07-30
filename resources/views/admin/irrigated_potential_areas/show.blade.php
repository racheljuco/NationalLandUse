@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Irrigated Potential Area' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.irrigated_potential_area.destroy', $irrigatedPotentialArea->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.irrigated_potential_area.index') }}" class="btn btn-primary" title="{{ trans('irrigated_potential_areas.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.irrigated_potential_area.create') }}" class="btn btn-success" title="{{ trans('irrigated_potential_areas.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.irrigated_potential_area.edit', $irrigatedPotentialArea->id ) }}" class="btn btn-primary" title="{{ trans('irrigated_potential_areas.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('irrigated_potential_areas.delete') }}" onclick="return confirm(&quot;{{ trans('irrigated_potential_areas.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('irrigated_potential_areas.land_use_plan_id') }}</dt>
            <dd>{{ optional($irrigatedPotentialArea->LandUsePlan)->name }}</dd>
            <dt>{{ trans('irrigated_potential_areas.village_id') }}</dt>
            <dd>{{ optional($irrigatedPotentialArea->Village)->village_name }}</dd>
            <dt>{{ trans('irrigated_potential_areas.name_division') }}</dt>
            <dd>{{ $irrigatedPotentialArea->name_division }}</dd>
            <dt>{{ trans('irrigated_potential_areas.name_ward') }}</dt>
            <dd>{{ $irrigatedPotentialArea->name_ward }}</dd>
            <dt>{{ trans('irrigated_potential_areas.area') }}</dt>
            <dd>{{ $irrigatedPotentialArea->area }}</dd>
            <dt>{{ trans('irrigated_potential_areas.district_area') }}</dt>
            <dd>{{ $irrigatedPotentialArea->district_area }}</dd>
            <dt>{{ trans('irrigated_potential_areas.created_at') }}</dt>
            <dd>{{ $irrigatedPotentialArea->created_at }}</dd>
            <dt>{{ trans('irrigated_potential_areas.updated_at') }}</dt>
            <dd>{{ $irrigatedPotentialArea->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection