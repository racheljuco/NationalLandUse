@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Village' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.village.destroy', $village->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.village.index') }}" class="btn btn-primary" title="{{ trans('villages.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.village.create') }}" class="btn btn-success" title="{{ trans('villages.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.village.edit', $village->id ) }}" class="btn btn-primary" title="{{ trans('villages.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('villages.delete') }}" onclick="return confirm(&quot;{{ trans('villages.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('villages.district_id') }}</dt>
            <dd>{{ optional($village->District)->district_name }}</dd>
            <dt>{{ trans('villages.village_name') }}</dt>
            <dd>{{ $village->village_name }}</dd>
            <dt>{{ trans('villages.deleted_at') }}</dt>
            <dd>{{ $village->deleted_at }}</dd>
            <dt>{{ trans('villages.created_at') }}</dt>
            <dd>{{ $village->created_at }}</dd>
            <dt>{{ trans('villages.updated_at') }}</dt>
            <dd>{{ $village->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection