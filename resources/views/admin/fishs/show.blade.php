@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($fish->name) ? $fish->name : 'Fish' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.fish.destroy', $fish->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.fish.index') }}" class="btn btn-primary" title="{{ trans('fishs.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.fish.create') }}" class="btn btn-success" title="{{ trans('fishs.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.fish.edit', $fish->id ) }}" class="btn btn-primary" title="{{ trans('fishs.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('fishs.delete') }}" onclick="return confirm(&quot;{{ trans('crops.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('fishs.type_fish_id') }}</dt>
            <dd>{{ optional($fish->TypeFish)->id }}</dd>
            <dt>{{ trans('fishs.name') }}</dt>
            <dd>{{ $fish->name }}</dd>
            <dt>{{ trans('fishs.number_of_fish') }}</dt>
            <dd>{{ $fish->number_of_fish }}</dd>
            <dt>{{ trans('fishs.description') }}</dt>
            <dd>{{ $fish->description }}</dd>
            <dt>{{ trans('fishs.deleted_at') }}</dt>
            <dd>{{ $fish->deleted_at }}</dd>
            <dt>{{ trans('fishs.created_at') }}</dt>
            <dd>{{ $fish->created_at }}</dd>
            <dt>{{ trans('fishs.updated_at') }}</dt>
            <dd>{{ $fish->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection


