@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($farmingMethod->name) ? $farmingMethod->name : 'Farming Method' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.farming_method.destroy', $farmingMethod->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.farming_method.index') }}" class="btn btn-primary" title="{{ trans('farming_methods.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.farming_method.create') }}" class="btn btn-success" title="{{ trans('farming_methods.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.farming_method.edit', $farmingMethod->id ) }}" class="btn btn-primary" title="{{ trans('farming_methods.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('farming_methods.delete') }}" onclick="return confirm(&quot;{{ trans('farming_methods.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('farming_methods.name') }}</dt>
            <dd>{{ $farmingMethod->name }}</dd>
            <dt>{{ trans('farming_methods.description') }}</dt>
            <dd>{{ $farmingMethod->description }}</dd>
            <dt>{{ trans('farming_methods.created_at') }}</dt>
            <dd>{{ $farmingMethod->created_at }}</dd>
            <dt>{{ trans('farming_methods.updated_at') }}</dt>
            <dd>{{ $farmingMethod->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection