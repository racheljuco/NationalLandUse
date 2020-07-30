@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Region' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.region.destroy', $region->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.region.index') }}" class="btn btn-primary" title="{{ trans('regions.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.region.create') }}" class="btn btn-success" title="{{ trans('regions.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.region.edit', $region->id ) }}" class="btn btn-primary" title="{{ trans('regions.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('regions.delete') }}" onclick="return confirm(&quot;{{ trans('regions.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('regions.region_name') }}</dt>
            <dd>{{ $region->region_name }}</dd>
            <dt>{{ trans('regions.code') }}</dt>
            <dd>{{ $region->code }}</dd>
            <dt>{{ trans('regions.deleted_at') }}</dt>
            <dd>{{ $region->deleted_at }}</dd>
            <dt>{{ trans('regions.created_at') }}</dt>
            <dd>{{ $region->created_at }}</dd>
            <dt>{{ trans('regions.updated_at') }}</dt>
            <dd>{{ $region->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection