@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($farmingSystem->name) ? $farmingSystem->name : 'Farming System' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.farming_system.destroy', $farmingSystem->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.farming_system.index') }}" class="btn btn-primary" title="{{ trans('farming_systems.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.farming_system.create') }}" class="btn btn-success" title="{{ trans('farming_systems.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.farming_system.edit', $farmingSystem->id ) }}" class="btn btn-primary" title="{{ trans('farming_systems.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('farming_systems.delete') }}" onclick="return confirm(&quot;{{ trans('farming_systems.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('farming_systems.name') }}</dt>
            <dd>{{ $farmingSystem->name }}</dd>
            <dt>{{ trans('farming_systems.description') }}</dt>
            <dd>{{ $farmingSystem->description }}</dd>
            <dt>{{ trans('farming_systems.created_at') }}</dt>
            <dd>{{ $farmingSystem->created_at }}</dd>
            <dt>{{ trans('farming_systems.updated_at') }}</dt>
            <dd>{{ $farmingSystem->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection