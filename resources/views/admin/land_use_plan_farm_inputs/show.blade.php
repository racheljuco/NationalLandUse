@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Land Use Plan Farm Input' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.land_use_plan_farm_input.destroy', $landUsePlanFarmInput->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.land_use_plan_farm_input.index') }}" class="btn btn-primary" title="{{ trans('land_use_plan_farm_inputs.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.land_use_plan_farm_input.create') }}" class="btn btn-success" title="{{ trans('land_use_plan_farm_inputs.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.land_use_plan_farm_input.edit', $landUsePlanFarmInput->id ) }}" class="btn btn-primary" title="{{ trans('land_use_plan_farm_inputs.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('land_use_plan_farm_inputs.delete') }}" onclick="return confirm(&quot;{{ trans('land_use_plan_farm_inputs.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('land_use_plan_farm_inputs.land_use_plan_id') }}</dt>
            <dd>{{ optional($landUsePlanFarmInput->LandUsePlan)->name }}</dd>
            <dt>{{ trans('land_use_plan_farm_inputs.farm_input_id') }}</dt>
            <dd>{{ optional($landUsePlanFarmInput->FarmInput)->name }}</dd>
            <dt>{{ trans('land_use_plan_farm_inputs.Status') }}</dt>
            <dd>{{ ($landUsePlanFarmInput->Status) ? 'Yes' : 'No' }}</dd>
            <dt>{{ trans('land_use_plan_farm_inputs.type_input') }}</dt>
            <dd>{{ $landUsePlanFarmInput->type_input }}</dd>
            <dt>{{ trans('land_use_plan_farm_inputs.average_price') }}</dt>
            <dd>{{ $landUsePlanFarmInput->average_price }}</dd>
            <dt>{{ trans('land_use_plan_farm_inputs.source_input') }}</dt>
            <dd>{{ $landUsePlanFarmInput->source_input }}</dd>
            <dt>{{ trans('land_use_plan_farm_inputs.availabity') }}</dt>
            <dd>{{ ($landUsePlanFarmInput->availabity) ? 'Yes' : 'No' }}</dd>
            <dt>{{ trans('land_use_plan_farm_inputs.created_at') }}</dt>
            <dd>{{ $landUsePlanFarmInput->created_at }}</dd>
            <dt>{{ trans('land_use_plan_farm_inputs.updated_at') }}</dt>
            <dd>{{ $landUsePlanFarmInput->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection