@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Land Use Distribution' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.land_use_distribution.destroy', $landUseDistribution->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.land_use_distribution.index') }}" class="btn btn-primary" title="{{ trans('land_use_distributions.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.land_use_distribution.create') }}" class="btn btn-success" title="{{ trans('land_use_distributions.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.land_use_distribution.edit', $landUseDistribution->id ) }}" class="btn btn-primary" title="{{ trans('land_use_distributions.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('land_use_distributions.delete') }}" onclick="return confirm(&quot;{{ trans('land_use_distributions.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('land_use_distributions.land_use_plan_id') }}</dt>
            <dd>{{ optional($landUseDistribution->LandUsePlan)->name }}</dd>
            <dt>{{ trans('land_use_distributions.village_area') }}</dt>
            <dd>{{ $landUseDistribution->village_area }}</dd>
            <dt>{{ trans('land_use_distributions.projected_households') }}</dt>
            <dd>{{ $landUseDistribution->projected_households }}</dd>
            <dt>{{ trans('land_use_distributions.year_preparation') }}</dt>
            <dd>{{ $landUseDistribution->year_preparation }}</dd>
            <dt>{{ trans('land_use_distributions.settlement') }}</dt>
            <dd>{{ $landUseDistribution->settlement }}</dd>
            <dt>{{ trans('land_use_distributions.social_service') }}</dt>
            <dd>{{ $landUseDistribution->social_service }}</dd>
            <dt>{{ trans('land_use_distributions.agriculture') }}</dt>
            <dd>{{ $landUseDistribution->agriculture }}</dd>
            <dt>{{ trans('land_use_distributions.agriculture_settlement') }}</dt>
            <dd>{{ $landUseDistribution->agriculture_settlement }}</dd>
            <dt>{{ trans('land_use_distributions.grazing') }}</dt>
            <dd>{{ $landUseDistribution->grazing }}</dd>
            <dt>{{ trans('land_use_distributions.utilization_forest') }}</dt>
            <dd>{{ $landUseDistribution->utilization_forest }}</dd>
            <dt>{{ trans('land_use_distributions.reserved_forest') }}</dt>
            <dd>{{ $landUseDistribution->reserved_forest }}</dd>
            <dt>{{ trans('land_use_distributions.other_reserved_land') }}</dt>
            <dd>{{ $landUseDistribution->other_reserved_land }}</dd>
            <dt>{{ trans('land_use_distributions.water_sources') }}</dt>
            <dd>{{ $landUseDistribution->water_sources }}</dd>
            <dt>{{ trans('land_use_distributions.wma') }}</dt>
            <dd>{{ $landUseDistribution->wma }}</dd>
            <dt>{{ trans('land_use_distributions.land_bank') }}</dt>
            <dd>{{ $landUseDistribution->land_bank }}</dd>
            <dt>{{ trans('land_use_distributions.land_investment') }}</dt>
            <dd>{{ $landUseDistribution->land_investment }}</dd>
            <dt>{{ trans('land_use_distributions.quarrying') }}</dt>
            <dd>{{ $landUseDistribution->quarrying }}</dd>
            <dt>{{ trans('land_use_distributions.deleted_at') }}</dt>
            <dd>{{ $landUseDistribution->deleted_at }}</dd>
            <dt>{{ trans('land_use_distributions.created_at') }}</dt>
            <dd>{{ $landUseDistribution->created_at }}</dd>
            <dt>{{ trans('land_use_distributions.updated_at') }}</dt>
            <dd>{{ $landUseDistribution->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection