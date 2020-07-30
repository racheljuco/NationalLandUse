@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Cultivated Land Yield' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.livestock_projection.destroy', $livestockProjection->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.livestock_projection.index') }}" class="btn btn-primary" title="{{ trans('livestock_projections.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.livestock_projection.create') }}" class="btn btn-success" title="{{ trans('livestock_projections.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.livestock_projection.edit', $livestockProjection->id ) }}" class="btn btn-primary" title="{{ trans('livestock_projections.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('livestock_projections.delete') }}" onclick="return confirm(&quot;{{ trans('livestock_projections.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('livestock_projections.land_use_plan_id') }}</dt>
            <dd>{{ optional($livestockProjection->LandUsePlan)->name }}</dd>
            <dt>{{ trans('livestock_projections.village_id') }}</dt>
            <dd>{{ optional($livestockProjection->Village)->village_name }}</dd>
            <dt>{{ trans('livestock_projections.livestock_id') }}</dt>
            <dd>{{ optional($livestockProjection->Livestock)->name }}</dd>
            <dt>{{ trans('livestock_projections.number_of_livestock_projected') }}</dt>
            <dd>{{ $livestockProjection->number_of_livestock_projected }}</dd>
            <dt>{{ trans('livestock_projections.landuse_projected') }}</dt>
            <dd>{{ $livestockProjection->landuse_projected }}</dd>
            <dt>{{ trans('livestock_projections.grazing_land') }}</dt>
            <dd>{{ $livestockProjection->grazing_land }}</dd>
            <dt>{{ trans('livestock_projections.created_at') }}</dt>
            <dd>{{ $livestockProjection->created_at }}</dd>
            <dt>{{ trans('livestock_projections.updated_at') }}</dt>
            <dd>{{ $livestockProjection->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection