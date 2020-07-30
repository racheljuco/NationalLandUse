@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($livestockType->name) ? $livestockType->name : 'Livestock Type' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.livestock_type.destroy', $livestockType->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.livestock_type.index') }}" class="btn btn-primary" title="{{ trans('livestock_types.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.livestock_type.create') }}" class="btn btn-success" title="{{ trans('livestock_types.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.livestock_type.edit', $livestockType->id ) }}" class="btn btn-primary" title="{{ trans('livestock_types.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('livestock_types.delete') }}" onclick="return confirm(&quot;{{ trans('livestock_types.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('livestock_types.name') }}</dt>
            <dd>{{ $livestockType->name }}</dd>
            <dt>{{ trans('livestock_types.description') }}</dt>
            <dd>{{ $livestockType->description }}</dd>
            <dt>{{ trans('livestock_types.created_at') }}</dt>
            <dd>{{ $livestockType->created_at }}</dd>
            <dt>{{ trans('livestock_types.updated_at') }}</dt>
            <dd>{{ $livestockType->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection