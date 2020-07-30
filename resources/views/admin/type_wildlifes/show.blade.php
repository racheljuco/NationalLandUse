@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($wildlifeType->name) ? $wildlifeType->name : 'Wildlife Type' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.wildlife_type.destroy', $wildlifeType->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.wildlife_type.index') }}" class="btn btn-primary" title="{{ trans('wildlife_types.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.wildlife_type.create') }}" class="btn btn-success" title="{{ trans('wildlife_types.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.wildlife_type.edit', $wildlifeType->id ) }}" class="btn btn-primary" title="{{ trans('wildlife_types.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('wildlife_types.delete') }}" onclick="return confirm(&quot;{{ trans('wildlife_types.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('wildlife_types.name') }}</dt>
            <dd>{{ $wildlifeType->name }}</dd>
            <dt>{{ trans('wildlife_types.description') }}</dt>
            <dd>{{ $wildlifeType->description }}</dd>
            <dt>{{ trans('wildlife_types.created_at') }}</dt>
            <dd>{{ $wildlifeType->created_at }}</dd>
            <dt>{{ trans('wildlife_types.updated_at') }}</dt>
            <dd>{{ $wildlifeType->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection