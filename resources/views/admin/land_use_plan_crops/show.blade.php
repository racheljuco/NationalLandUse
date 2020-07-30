@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Land Use Plan Crop' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.land_use_plan_crop.destroy', $landUsePlanCrop->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.land_use_plan_crop.index') }}" class="btn btn-primary" title="{{ trans('land_use_plan_crops.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.land_use_plan_crop.create') }}" class="btn btn-success" title="{{ trans('land_use_plan_crops.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.land_use_plan_crop.edit', $landUsePlanCrop->id ) }}" class="btn btn-primary" title="{{ trans('land_use_plan_crops.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('land_use_plan_crops.delete') }}" onclick="return confirm(&quot;{{ trans('land_use_plan_crops.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('land_use_plan_crops.land_use_plan_id') }}</dt>
            <dd>{{ optional($landUsePlanCrop->LandUsePlan)->name }}</dd>
            <dt>{{ trans('land_use_plan_crops.crop_id') }}</dt>
            <dd>{{ optional($landUsePlanCrop->Crop)->name }}</dd>

        </dl>

    </div>
</div>

@endsection