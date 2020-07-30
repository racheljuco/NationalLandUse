@extends('layouts.master')

@section('content')

<div class="card"> 
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($mineral->name) ? $mineral->name : 'Mineral' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.mineral.destroy', $mineral->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.mineral.index') }}" class="btn btn-primary" title="{{ trans('minerals.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.mineral.create') }}" class="btn btn-success" title="{{ trans('minerals.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.mineral.edit', $mineral->id ) }}" class="btn btn-primary" title="{{ trans('minerals.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('minerals.delete') }}" onclick="return confirm(&quot;{{ trans('crops.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('minerals.type_mineral_id') }}</dt>
            <dd>{{ optional($mineral->TypeMineral)->id }}</dd>
            <dt>{{ trans('minerals.name') }}</dt>
            <dd>{{ $mineral->name }}</dd>
            <dt>{{ trans('minerals.number_of_mineral') }}</dt>
            <dd>{{ $mineral->number_of_mineral }}</dd>
            <dt>{{ trans('minerals.description') }}</dt>
            <dd>{{ $mineral->description }}</dd>
            <dt>{{ trans('minerals.deleted_at') }}</dt>
            <dd>{{ $mineral->deleted_at }}</dd>
            <dt>{{ trans('minerals.created_at') }}</dt>
            <dd>{{ $mineral->created_at }}</dd>
            <dt>{{ trans('minerals.updated_at') }}</dt>
            <dd>{{ $mineral->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection


