@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($farmingTechnique->name) ? $farmingTechnique->name : 'Farming Technique' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.farming_technique.destroy', $farmingTechnique->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.farming_technique.index') }}" class="btn btn-primary" title="{{ trans('farming_techniques.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.farming_technique.create') }}" class="btn btn-success" title="{{ trans('farming_techniques.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.farming_technique.edit', $farmingTechnique->id ) }}" class="btn btn-primary" title="{{ trans('farming_techniques.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('farming_techniques.delete') }}" onclick="return confirm(&quot;{{ trans('farming_techniques.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('farming_techniques.name') }}</dt>
            <dd>{{ $farmingTechnique->name }}</dd>
            <dt>{{ trans('farming_techniques.status') }}</dt>
            <dd>{{ ($farmingTechnique->status) ? 'Yes' : 'No' }}</dd>
            <dt>{{ trans('farming_techniques.description') }}</dt>
            <dd>{{ $farmingTechnique->description }}</dd>
            <dt>{{ trans('farming_techniques.created_at') }}</dt>
            <dd>{{ $farmingTechnique->created_at }}</dd>
            <dt>{{ trans('farming_techniques.updated_at') }}</dt>
            <dd>{{ $farmingTechnique->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection