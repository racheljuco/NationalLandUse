@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($hamlet->name) ? $hamlet->name : 'Hamlet' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.hamlet.destroy', $hamlet->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.hamlet.index') }}" class="btn btn-primary" title="{{ trans('hamlets.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.hamlet.create') }}" class="btn btn-success" title="{{ trans('hamlets.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.hamlet.edit', $hamlet->id ) }}" class="btn btn-primary" title="{{ trans('hamlets.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('hamlets.delete') }}" onclick="return confirm(&quot;{{ trans('hamlets.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('hamlets.name') }}</dt>
            <dd>{{ $hamlet->name }}</dd>
            <dt>{{ trans('hamlets.description') }}</dt>
            <dd>{{ $hamlet->description }}</dd>
            <dt>{{ trans('hamlets.village_id') }}</dt>
            <dd>{{ optional($hamlet->Village)->name }}</dd>
            <dt>{{ trans('hamlets.deleted_at') }}</dt>
            <dd>{{ $hamlet->deleted_at }}</dd>
            <dt>{{ trans('hamlets.created_at') }}</dt>
            <dd>{{ $hamlet->created_at }}</dd>
            <dt>{{ trans('hamlets.updated_at') }}</dt>
            <dd>{{ $hamlet->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection