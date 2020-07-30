@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Cultivated Land Yield' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.cultivated_land_yield.destroy', $cultivatedLandYield->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.cultivated_land_yield.index') }}" class="btn btn-primary" title="{{ trans('cultivated_land_yields.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.cultivated_land_yield.create') }}" class="btn btn-success" title="{{ trans('cultivated_land_yields.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.cultivated_land_yield.edit', $cultivatedLandYield->id ) }}" class="btn btn-primary" title="{{ trans('cultivated_land_yields.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('cultivated_land_yields.delete') }}" onclick="return confirm(&quot;{{ trans('cultivated_land_yields.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('cultivated_land_yields.land_use_plan_id') }}</dt>
            <dd>{{ optional($cultivatedLandYield->LandUsePlan)->name }}</dd>
            <dt>{{ trans('cultivated_land_yields.village_id') }}</dt>
            <dd>{{ optional($cultivatedLandYield->Village)->village_name }}</dd>
            <dt>{{ trans('cultivated_land_yields.crop_id') }}</dt>
            <dd>{{ optional($cultivatedLandYield->Crop)->name }}</dd>
            <dt>{{ trans('cultivated_land_yields.actual_cultivated_land') }}</dt>
            <dd>{{ $cultivatedLandYield->actual_cultivated_land }}</dd>
            <dt>{{ trans('cultivated_land_yields.possible_yield') }}</dt>
            <dd>{{ $cultivatedLandYield->possible_yield }}</dd>
            <dt>{{ trans('cultivated_land_yields.created_at') }}</dt>
            <dd>{{ $cultivatedLandYield->created_at }}</dd>
            <dt>{{ trans('cultivated_land_yields.updated_at') }}</dt>
            <dd>{{ $cultivatedLandYield->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection