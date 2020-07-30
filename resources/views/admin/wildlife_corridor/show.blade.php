@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header"> 

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Wildlife Corridors' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.wildlife_corridor.destroy', $wildlifeCorridor->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.wildlife_corridor.index') }}" class="btn btn-primary" title="{{ trans('wildlife_corridors.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.wildlife_corridor.create') }}" class="btn btn-success" title="{{ trans('wildlife_corridors.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.wildlife_corridor.edit', $wildlifeCorridor->id ) }}" class="btn btn-primary" title="{{ trans('wildlife_corridors.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('wildlife_corridors.delete') }}" onclick="return confirm(&quot;{{ trans('wildlife_corridors.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('wildlife_corridors.land_use_plan_id') }}</dt>
            <dd>{{ optional($wildlifeCorridor->LandUsePlan)->name }}</dd>
            <dt>{{ trans('wildlife_corridors.village_id') }}</dt>
            <dd>{{ optional($wildlifeCorridor->Village)->village_name }}</dd>
            <dt>{{ trans('wildlife_corridors.name_division') }}</dt>
            <dd>{{ $wildlifeCorridor->name_division }}</dd>
            <dt>{{ trans('wildlife_corridors.name_ward') }}</dt>
            <dd>{{ $wildlifeCorridor->name_ward }}</dd>
            <dt>{{ trans('wildlife_corridors.wildlife_id') }}</dt>
            <dd>{{ optional($wildlifeCorridor->Wildlife)->name }}</dd>
            <dt>{{ trans('wildlife_corridors.wildlife_corridor_name') }}</dt>
            <dd>{{ $wildlifeCorridor->wildlife_corridor_name }}</dd>
            <dt>{{ trans('wildlife_corridors.created_at') }}</dt>
            <dd>{{ $wildlifeCorridor->created_at }}</dd>
            <dt>{{ trans('wildlife_corridors.updated_at') }}</dt>
            <dd>{{ $wildlifeCorridor->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection