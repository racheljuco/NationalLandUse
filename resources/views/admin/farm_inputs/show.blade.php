@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($farmInput->name) ? $farmInput->name : 'Farm Input' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.farm_input.destroy', $farmInput->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.farm_input.index') }}" class="btn btn-primary" title="{{ trans('farm_inputs.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.farm_input.create') }}" class="btn btn-success" title="{{ trans('farm_inputs.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.farm_input.edit', $farmInput->id ) }}" class="btn btn-primary" title="{{ trans('farm_inputs.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('farm_inputs.delete') }}" onclick="return confirm(&quot;{{ trans('farm_inputs.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('farm_inputs.name') }}</dt>
            <dd>{{ $farmInput->name }}</dd>
            <dt>{{ trans('farm_inputs.description') }}</dt>
            <dd>{{ $farmInput->description }}</dd>
            <dt>{{ trans('farm_inputs.created_at') }}</dt>
            <dd>{{ $farmInput->created_at }}</dd>
            <dt>{{ trans('farm_inputs.updated_at') }}</dt>
            <dd>{{ $farmInput->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection