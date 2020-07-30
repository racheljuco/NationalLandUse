@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'District' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.district.destroy', $district->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.district.index') }}" class="btn btn-primary" title="{{ trans('districts.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.district.create') }}" class="btn btn-success" title="{{ trans('districts.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.district.edit', $district->id ) }}" class="btn btn-primary" title="{{ trans('districts.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('districts.delete') }}" onclick="return confirm(&quot;{{ trans('districts.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('districts.region_id') }}</dt>
            <dd>{{ optional($district->Region)->region_name }}</dd>
            <dt>{{ trans('districts.district_name') }}</dt>
            <dd>{{ $district->district_name }}</dd>
            <dt>{{ trans('districts.code') }}</dt>
            <dd>{{ $district->code }}</dd>
            <dt>{{ trans('districts.deleted_at') }}</dt>
            <dd>{{ $district->deleted_at }}</dd>
            <dt>{{ trans('districts.created_at') }}</dt>
            <dd>{{ $district->created_at }}</dd>
            <dt>{{ trans('districts.updated_at') }}</dt>
            <dd>{{ $district->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection