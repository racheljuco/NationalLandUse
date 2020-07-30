@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($cropType->name) ? $cropType->name : 'Crop Type' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.crop_type.destroy', $cropType->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.crop_type.index') }}" class="btn btn-primary" title="{{ trans('crop_types.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.crop_type.create') }}" class="btn btn-success" title="{{ trans('crop_types.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.crop_type.edit', $cropType->id ) }}" class="btn btn-primary" title="{{ trans('crop_types.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('crop_types.delete') }}" onclick="return confirm(&quot;{{ trans('crop_types.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('crop_types.name') }}</dt>
            <dd>{{ $cropType->name }}</dd>
            <dt>{{ trans('crop_types.description') }}</dt>
            <dd>{{ $cropType->description }}</dd>
            <dt>{{ trans('crop_types.created_at') }}</dt>
            <dd>{{ $cropType->created_at }}</dd>
            <dt>{{ trans('crop_types.updated_at') }}</dt>
            <dd>{{ $cropType->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection