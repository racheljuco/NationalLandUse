@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Cattle Keepers' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.cattle_keeper.destroy', $cattleKeeper->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.cattle_keeper.index') }}" class="btn btn-primary" title="{{ trans('cattle_keepers.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.cattle_keeper.create') }}" class="btn btn-success" title="{{ trans('cattle_keepers.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.cattle_keeper.edit', $cattleKeeper->id ) }}" class="btn btn-primary" title="{{ trans('cattle_keepers.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('cattle_keepers.delete') }}" onclick="return confirm(&quot;{{ trans('cattle_keepers.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('cattle_keepers.land_use_plan_id') }}</dt>
            <dd>{{ optional($cattleKeeper->LandUsePlan)->name }}</dd>
            <dt>{{ trans('cattle_keepers.village_id') }}</dt>
            <dd>{{ optional($cattleKeeper->Village)->village_name }}</dd>
            <dt>{{ trans('cattle_keepers.ward_id') }}</dt>
            <dd>{{ optional($cattleKeeper->Ward)->name }}</dd>
            <dt>{{ trans('cattle_keepers.livestock_id') }}</dt>
            <dd>{{ optional($cattleKeeper->Livestock)->name }}</dd>
            <dt>{{ trans('cattle_keepers.number_of_cattle') }}</dt>
            <dd>{{ $cattleKeeper->number_of_cattle }}</dd>
            <dt>{{ trans('cattle_keepers.cattle_keeper_name') }}</dt>
            <dd>{{ $cattleKeeper->cattle_keeper_name }}</dd>
            <dt>{{ trans('cattle_keepers.division_name') }}</dt>
            <dd>{{ $cattleKeeper->division_name }}</dd>
            <dt>{{ trans('cattle_keepers.created_at') }}</dt>
            <dd>{{ $cattleKeeper->created_at }}</dd>
            <dt>{{ trans('cattle_keepers.updated_at') }}</dt>
            <dd>{{ $cattleKeeper->updated_at }}</dd>
            
        </dl>

    </div>
</div>

@endsection