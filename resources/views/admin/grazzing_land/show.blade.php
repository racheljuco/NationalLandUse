@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Cultivated Land Yield' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.grazzing_land.destroy', $grazingLand->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.grazzing_land.index') }}" class="btn btn-primary" title="{{ trans('grazzing_lands.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.grazzing_land.create') }}" class="btn btn-success" title="{{ trans('grazzing_lands.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.grazzing_land.edit', $grazingLand->id ) }}" class="btn btn-primary" title="{{ trans('grazzing_lands.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('grazzing_lands.delete') }}" onclick="return confirm(&quot;{{ trans('grazzing_lands.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('grazzing_lands.land_use_plan_id') }}</dt>
            <dd>{{ optional($grazingLand->LandUsePlan)->name }}</dd>
            <dt>{{ trans('grazzing_lands.village_id') }}</dt>
            <dd>{{ optional($grazingLand->Village)->village_name }}</dd>
            <dt>{{ trans('grazzing_lands.livestock_id') }}</dt>
            <dd>{{ optional($grazingLand->Livestock)->name }}</dd>area
            <dt>{{ trans('grazzing_lands.name_division') }}</dt>
            <dd>{{ $grazingLand->name_division }}</dd>
            <dt>{{ trans('grazzing_lands.name_ward') }}</dt>
            <dd>{{ $grazingLand->name_ward }}</dd>
            <dt>{{ trans('grazzing_lands.area') }}</dt>
            <dd>{{ $grazingLand->area }}</dd>
            <dt>{{ trans('grazzing_lands.district_area') }}</dt>
            <dd>{{ $grazingLand->district_area }}</dd>
            <dt>{{ trans('grazzing_lands.created_at') }}</dt>
            <dd>{{ $grazingLand->created_at }}</dd>
            <dt>{{ trans('grazzing_lands.updated_at') }}</dt>
            <dd>{{ $grazingLand->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection