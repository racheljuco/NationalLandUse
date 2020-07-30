@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($farmingPractice->name) ? $farmingPractice->name : 'Farming Practice' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.farming_practice.destroy', $farmingPractice->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.farming_practice.index') }}" class="btn btn-primary" title="{{ trans('farming_practices.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.farming_practice.create') }}" class="btn btn-success" title="{{ trans('farming_practices.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.farming_practice.edit', $farmingPractice->id ) }}" class="btn btn-primary" title="{{ trans('farming_practices.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('farming_practices.delete') }}" onclick="return confirm(&quot;{{ trans('farming_practices.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('farming_practices.name') }}</dt>
            <dd>{{ $farmingPractice->name }}</dd>
            <dt>{{ trans('farming_practices.description') }}</dt>
            <dd>{{ $farmingPractice->description }}</dd>
            <dt>{{ trans('farming_practices.created_at') }}</dt>
            <dd>{{ $farmingPractice->created_at }}</dd>
            <dt>{{ trans('farming_practices.updated_at') }}</dt>
            <dd>{{ $farmingPractice->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection