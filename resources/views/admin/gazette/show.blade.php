@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($gazette->title) ? $gazette->title : 'Gazette' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.gazette.destroy', $gazette->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.gazette.index') }}" class="btn btn-primary" title="{{ trans('gazettes.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.gazette.create') }}" class="btn btn-success" title="{{ trans('gazettes.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.gazette.edit', $gazette->id ) }}" class="btn btn-primary" title="{{ trans('gazettes.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('gazettes.delete') }}" onclick="return confirm(&quot;{{ trans('gazettes.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('gazettes.land_use_plan_id') }}</dt>
            <dd>{{ optional($gazette->LandUsePlan)->name }}</dd>
            <dt>{{ trans('gazettes.gn_number') }}</dt>
            <dd>{{ $gazette->gn_number }}</dd>
            <dt>{{ trans('gazettes.title') }}</dt>
            <dd>{{ $gazette->title }}</dd>
            <dt>{{ trans('gazettes.published_date') }}</dt>
            <dd>{{ $gazette->published_date }}</dd>
            <dt>{{ trans('gazettes.expired_date') }}</dt>
            <dd>{{ $gazette->expired_date }}</dd>
            <dt>{{ trans('gazettes.deleted_at') }}</dt>
            <dd>{{ $gazette->deleted_at }}</dd>
            <dt>{{ trans('gazettes.created_at') }}</dt>
            <dd>{{ $gazette->created_at }}</dd>
            <dt>{{ trans('gazettes.updated_at') }}</dt>
            <dd>{{ $gazette->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection