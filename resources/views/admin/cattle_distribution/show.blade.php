@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Cattle Distribution' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.cattle_distribution.destroy', $cattleDistribution->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.cattle_distribution.index') }}" class="btn btn-primary" title="{{ trans('cattle_distributions.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.cattle_distribution.create') }}" class="btn btn-success" title="{{ trans('cattle_distributions.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.cattle_distribution.edit', $cattleDistribution->id ) }}" class="btn btn-primary" title="{{ trans('cattle_distributions.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('cattle_distributions.delete') }}" onclick="return confirm(&quot;{{ trans('cattle_distributions.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('cattle_distributions.land_use_plan_id') }}</dt>
            <dd>{{ optional($cattleDistribution->LandUsePlan)->name }}</dd>
            <dt>{{ trans('cattle_distributions.village_id') }}</dt>
            <dd>{{ optional($cattleDistribution->Village)->village_name }}</dd>
            <dt>{{ trans('cattle_distributions.livestock_id') }}</dt>
            <dd>{{ optional($cattleDistribution->Livestock)->name }}</dd>
            <dt>{{ trans('cattle_distributions.name_division') }}</dt>
            <dd>{{ $cattleDistribution->name_division }}</dd>
            <dt>{{ trans('cattle_distributions.name_ward') }}</dt>
            <dd>{{ $cattleDistribution->name_ward }}</dd>
            <dt>{{ trans('cattle_distributions.total_indigineous_cattle') }}</dt>
            <dd>{{ $cattleDistribution->total_indigineous_cattle }}</dd>
            <dt>{{ trans('cattle_distributions.total_dairy_cattle') }}</dt>
            <dd>{{ $cattleDistribution->total_dairy_cattle }}</dd>
            <dt>{{ trans('cattle_distributions.total_number_cattle') }}</dt>
            <dd>{{ $cattleDistribution->total_number_cattle }}</dd>
            <dt>{{ trans('cattle_distributions.total_number_livestock_unit') }}</dt>
            <dd>{{ $cattleDistribution->total_number_livestock_unit }}</dd>
            <dt>{{ trans('cattle_distributions.cattle_keepers_number') }}</dt>
            <dd>{{ $cattleDistribution->cattle_keepers_number }}</dd>
            <dt>{{ trans('cattle_distributions.created_at') }}</dt>
            <dd>{{ $cattleDistribution->created_at }}</dd>
            <dt>{{ trans('cattle_distributions.updated_at') }}</dt>
            <dd>{{ $cattleDistribution->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection