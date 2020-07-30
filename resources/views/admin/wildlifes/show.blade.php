@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($wildlife->name) ? $wildlife->name : 'Wildlife' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.wildlife.destroy', $wildlife->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.wildlife.index') }}" class="btn btn-primary" title="{{ trans('wildlifes.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.wildlife.create') }}" class="btn btn-success" title="{{ trans('wildlifes.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.wildlife.edit', $wildlife->id ) }}" class="btn btn-primary" title="{{ trans('wildlifes.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('wildlifes.delete') }}" onclick="return confirm(&quot;{{ trans('crops.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('wildlifes.type_wildlife_id') }}</dt>
            <dd>{{ optional($wildlife->TypeWildlife)->id }}</dd>
            <dt>{{ trans('wildlifes.name') }}</dt>
            <dd>{{ $wildlife->name }}</dd>
            <dt>{{ trans('wildlifes.number_of_wildlife') }}</dt>
            <dd>{{ $wildlife->number_of_wildlife }}</dd>
            <dt>{{ trans('wildlifes.description') }}</dt>
            <dd>{{ $wildlife->description }}</dd>
            <dt>{{ trans('wildlifes.deleted_at') }}</dt>
            <dd>{{ $wildlife->deleted_at }}</dd>
            <dt>{{ trans('wildlifes.created_at') }}</dt>
            <dd>{{ $wildlife->created_at }}</dd>
            <dt>{{ trans('wildlifes.updated_at') }}</dt>
            <dd>{{ $wildlife->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection


