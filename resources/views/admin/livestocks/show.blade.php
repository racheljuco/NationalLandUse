@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($livestock->name) ? $livestock->name : 'Livestock' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.livestock.destroy', $livestock->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.livestock.index') }}" class="btn btn-primary" title="{{ trans('livestocks.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.livestock.create') }}" class="btn btn-success" title="{{ trans('livestocks.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.livestock.edit', $livestock->id ) }}" class="btn btn-primary" title="{{ trans('livestocks.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('livestocks.delete') }}" onclick="return confirm(&quot;{{ trans('crops.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('livestocks.type_livestock_id') }}</dt>
            <dd>{{ optional($livestock->TypeLivestock)->id }}</dd>
            <dt>{{ trans('livestocks.name') }}</dt>
            <dd>{{ $livestock->name }}</dd>
            <dt>{{ trans('livestocks.number_of_livestock') }}</dt>
            <dd>{{ $livestock->number_of_livestock }}</dd>
            <dt>{{ trans('livestocks.description') }}</dt>
            <dd>{{ $livestock->description }}</dd>
            <dt>{{ trans('livestocks.deleted_at') }}</dt>
            <dd>{{ $livestock->deleted_at }}</dd>
            <dt>{{ trans('livestocks.created_at') }}</dt>
            <dd>{{ $livestock->created_at }}</dd>
            <dt>{{ trans('livestocks.updated_at') }}</dt>
            <dd>{{ $livestock->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection


