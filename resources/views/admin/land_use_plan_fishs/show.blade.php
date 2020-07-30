@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Land Use Plan Fish' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.land_use_plan_fish.destroy', $landUsePlanFish->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.land_use_plan_fish.index') }}" class="btn btn-primary" title="{{ trans('land_use_plan_fishs.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.land_use_plan_fish.create') }}" class="btn btn-success" title="{{ trans('land_use_plan_fishs.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.land_use_plan_fish.edit', $landUsePlanFish->id ) }}" class="btn btn-primary" title="{{ trans('land_use_plan_fishs.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('land_use_plan_fishs.delete') }}" onclick="return confirm(&quot;{{ trans('land_use_plan_fishs.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('land_use_plan_fishs.land_use_plan_id') }}</dt>
            <dd>{{ optional($landUsePlanFish->LandUsePlan)->name }}</dd>
            <dt>{{ trans('land_use_plan_fishs.fish_id') }}</dt>
            <dd>{{ optional($landUsePlanFish->Fish)->name }}</dd>

        </dl>

    </div>
</div>

@endsection