@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($ward->name) ? $ward->name : 'Ward' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.ward.destroy', $ward->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.ward.index') }}" class="btn btn-primary" title="{{ trans('wards.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.ward.create') }}" class="btn btn-success" title="{{ trans('wards.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.ward.edit', $ward->id ) }}" class="btn btn-primary" title="{{ trans('wards.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('wards.delete') }}" onclick="return confirm(&quot;{{ trans('wards.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('wards.district_id') }}</dt>
            <dd>{{ optional($ward->District)->district_name }}</dd>
            <dt>{{ trans('wards.name') }}</dt>
            <dd>{{ $ward->name }}</dd>
            <dt>{{ trans('wards.code') }}</dt>
            <dd>{{ $ward->code }}</dd>
            <dt>{{ trans('wards.description') }}</dt>
            <dd>{{ $ward->description }}</dd>
            <dt>{{ trans('wards.deleted_at') }}</dt>
            <dd>{{ $ward->deleted_at }}</dd>
            <dt>{{ trans('wards.created_at') }}</dt>
            <dd>{{ $ward->created_at }}</dd>
            <dt>{{ trans('wards.updated_at') }}</dt>
            <dd>{{ $ward->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection