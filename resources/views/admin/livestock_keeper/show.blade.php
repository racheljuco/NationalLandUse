@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Livestock Keepers' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.livestock_keeper.destroy', $livestockKeeper->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.livestock_keeper.index') }}" class="btn btn-primary" title="{{ trans('livestock_keepers.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.livestock_keeper.create') }}" class="btn btn-success" title="{{ trans('livestock_keepers.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.livestock_keeper.edit', $livestockKeeper->id ) }}" class="btn btn-primary" title="{{ trans('livestock_keepers.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('livestock_keepers.delete') }}" onclick="return confirm(&quot;{{ trans('livestock_keepers.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('livestock_keepers.land_use_plan_id') }}</dt>
            <dd>{{ optional($livestockKeeper->LandUsePlan)->name }}</dd>
            <dt>{{ trans('livestock_keepers.village_id') }}</dt>
            <dd>{{ optional($livestockKeeper->Village)->village_name }}</dd>
            <dt>{{ trans('livestock_keepers.livestock_id') }}</dt>
            <dd>{{ optional($livestockKeeper->Livestock)->name }}</dd>
            <dt>{{ trans('livestock_keepers.number_of_livestock') }}</dt>
            <dd>{{ $livestockKeeper->number_of_livestock }}</dd>
            <dt>{{ trans('livestock_keepers.livestock_farm_name') }}</dt>
            <dd>{{ $livestockKeeper->livestock_farm_name }}</dd>
            <dt>{{ trans('livestock_keepers.created_at') }}</dt>
            <dd>{{ $livestockKeeper->created_at }}</dd>
            <dt>{{ trans('livestock_keepers.updated_at') }}</dt>
            <dd>{{ $livestockKeeper->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection