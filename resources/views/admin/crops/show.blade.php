@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($crop->name) ? $crop->name : 'Crop' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.crop.destroy', $crop->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.crop.index') }}" class="btn btn-primary" title="{{ trans('crops.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.crop.create') }}" class="btn btn-success" title="{{ trans('crops.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.crop.edit', $crop->id ) }}" class="btn btn-primary" title="{{ trans('crops.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('crops.delete') }}" onclick="return confirm(&quot;{{ trans('crops.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('crops.type_crop_id') }}</dt>
            <dd>{{ optional($crop->TypeCrop)->id }}</dd>
            <dt>{{ trans('crops.name') }}</dt>
            <dd>{{ $crop->name }}</dd>
            <dt>{{ trans('crops.description') }}</dt>
            <dd>{{ $crop->description }}</dd>
            <dt>{{ trans('crops.deleted_at') }}</dt>
            <dd>{{ $crop->deleted_at }}</dd>
            <dt>{{ trans('crops.created_at') }}</dt>
            <dd>{{ $crop->created_at }}</dd>
            <dt>{{ trans('crops.updated_at') }}</dt>
            <dd>{{ $crop->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection