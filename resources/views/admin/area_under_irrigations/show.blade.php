@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Area Under Irrigation' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.area_under_irrigation.destroy', $areaUnderIrrigation->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.area_under_irrigation.index') }}" class="btn btn-primary" title="{{ trans('area_under_irrigations.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.area_under_irrigation.create') }}" class="btn btn-success" title="{{ trans('area_under_irrigations.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.area_under_irrigation.edit', $areaUnderIrrigation->id ) }}" class="btn btn-primary" title="{{ trans('area_under_irrigations.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('area_under_irrigations.delete') }}" onclick="return confirm(&quot;{{ trans('area_under_irrigations.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('area_under_irrigations.land_use_plan_id') }}</dt>
            <dd>{{ optional($areaUnderIrrigation->LandUsePlan)->name }}</dd>
            <dt>{{ trans('area_under_irrigations.village_id') }}</dt>
            <dd>{{ optional($areaUnderIrrigation->Village)->village_name }}</dd>
            <dt>{{ trans('area_under_irrigations.area_irrigation') }}</dt>
            <dd>{{ $areaUnderIrrigation->area_irrigation }}</dd>
            <dt>{{ trans('area_under_irrigations.area_under_irrigation') }}</dt>
            <dd>{{ $areaUnderIrrigation->area_under_irrigation }}</dd>
            <dt>{{ trans('area_under_irrigations.perfomance') }}</dt>
            <dd>{{ $areaUnderIrrigation->perfomance }}</dd>
            <dt>{{ trans('area_under_irrigations.created_at') }}</dt>
            <dd>{{ $areaUnderIrrigation->created_at }}</dd>
            <dt>{{ trans('area_under_irrigations.updated_at') }}</dt>
            <dd>{{ $areaUnderIrrigation->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection