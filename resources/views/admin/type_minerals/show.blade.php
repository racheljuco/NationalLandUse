@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($mineralType->name) ? $mineralType->name : 'Mineral Type' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.mineral_type.destroy', $mineralType->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.mineral_type.index') }}" class="btn btn-primary" title="{{ trans('mineral_types.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.mineral_type.create') }}" class="btn btn-success" title="{{ trans('mineral_types.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.mineral_type.edit', $mineralType->id ) }}" class="btn btn-primary" title="{{ trans('mineral_types.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('mineral_types.delete') }}" onclick="return confirm(&quot;{{ trans('mineral_types.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('mineral_types.name') }}</dt>
            <dd>{{ $mineralType->name }}</dd>
            <dt>{{ trans('mineral_types.description') }}</dt>
            <dd>{{ $mineralType->description }}</dd>
            <dt>{{ trans('mineral_types.created_at') }}</dt>
            <dd>{{ $mineralType->created_at }}</dd>
            <dt>{{ trans('mineral_types.updated_at') }}</dt>
            <dd>{{ $mineralType->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection