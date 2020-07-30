@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($landUsePlan->name) ? $landUsePlan->name : 'Land Use Plan' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.land_use_plan.destroy', $landUsePlan->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.land_use_plan.index') }}" class="btn btn-primary" title="{{ trans('land_use_plans.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.land_use_plan.create') }}" class="btn btn-success" title="{{ trans('land_use_plans.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.land_use_plan.edit', $landUsePlan->id ) }}" class="btn btn-primary" title="{{ trans('land_use_plans.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('land_use_plans.delete') }}" onclick="return confirm(&quot;{{ trans('land_use_plans.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('land_use_plans.village_id') }}</dt>
            <dd>{{ optional($landUsePlan->Village)->village_name }}</dd>
            <dt>{{ trans('land_use_plans.land_use_plan_status_id') }}</dt>
            <dd>{{ optional($landUsePlan->LandUsePlanStatus)->name }}</dd>
            <dt>{{ trans('land_use_plans.name') }}</dt>
            <dd>{{ $landUsePlan->name }}</dd>
            <dt>{{ trans('land_use_plans.description') }}</dt>
            <dd>{{ $landUsePlan->description }}</dd>
            <dt>{{ trans('land_use_plans.created_date') }}</dt>
            <dd>{{ $landUsePlan->created_date }}</dd>
            <dt>{{ trans('land_use_plans.status') }}</dt>
            <dd>{{ ($landUsePlan->status) ? 'Yes' : 'No' }}</dd>
            <dt>{{ trans('land_use_plans.file') }}</dt>
            <dd>{{ $landUsePlan->file }}</dd>
            <dt>{{ trans('land_use_plans.deleted_at') }}</dt>
            <dd>{{ $landUsePlan->deleted_at }}</dd>
            <dt>{{ trans('land_use_plans.created_at') }}</dt>
            <dd>{{ $landUsePlan->created_at }}</dd>
            <dt>{{ trans('land_use_plans.updated_at') }}</dt>
            <dd>{{ $landUsePlan->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection