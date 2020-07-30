@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($harvestingMethod->name) ? $harvestingMethod->name : 'Harvesting Method' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.harvesting_method.destroy', $harvestingMethod->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.harvesting_method.index') }}" class="btn btn-primary" title="{{ trans('harvesting_methods.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.harvesting_method.create') }}" class="btn btn-success" title="{{ trans('harvesting_methods.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.harvesting_method.edit', $harvestingMethod->id ) }}" class="btn btn-primary" title="{{ trans('harvesting_methods.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('harvesting_methods.delete') }}" onclick="return confirm(&quot;{{ trans('harvesting_methods.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('harvesting_methods.name') }}</dt>
            <dd>{{ $harvestingMethod->name }}</dd>
            <dt>{{ trans('harvesting_methods.description') }}</dt>
            <dd>{{ $harvestingMethod->description }}</dd>
            <dt>{{ trans('harvesting_methods.created_at') }}</dt>
            <dd>{{ $harvestingMethod->created_at }}</dd>
            <dt>{{ trans('harvesting_methods.updated_at') }}</dt>
            <dd>{{ $harvestingMethod->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection