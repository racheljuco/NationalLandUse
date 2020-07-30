@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($landUsePlanStatus->name) ? $landUsePlanStatus->name : 'Land Use Plan Status' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.land_use_plan_status.destroy', $landUsePlanStatus->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.land_use_plan_status.index') }}" class="btn btn-primary" title="{{ trans('land_use_plan_statuses.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.land_use_plan_status.create') }}" class="btn btn-success" title="{{ trans('land_use_plan_statuses.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.land_use_plan_status.edit', $landUsePlanStatus->id ) }}" class="btn btn-primary" title="{{ trans('land_use_plan_statuses.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('land_use_plan_statuses.delete') }}" onclick="return confirm(&quot;{{ trans('land_use_plan_statuses.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('land_use_plan_statuses.name') }}</dt>
            <dd>{{ $landUsePlanStatus->name }}</dd>
            <dt>{{ trans('land_use_plan_statuses.description') }}</dt>
            <dd>{{ $landUsePlanStatus->description }}</dd>
            <dt>{{ trans('land_use_plan_statuses.created_at') }}</dt>
            <dd>{{ $landUsePlanStatus->created_at }}</dd>
            <dt>{{ trans('land_use_plan_statuses.updated_at') }}</dt>
            <dd>{{ $landUsePlanStatus->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection