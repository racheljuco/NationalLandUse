@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($organisation->name) ? $organisation->name : 'Organisation' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.organisation.destroy', $organisation->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.organisation.index') }}" class="btn btn-primary" title="{{ trans('organisations.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.organisation.create') }}" class="btn btn-success" title="{{ trans('organisations.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.organisation.edit', $organisation->id ) }}" class="btn btn-primary" title="{{ trans('organisations.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('organisations.delete') }}" onclick="return confirm(&quot;{{ trans('organisations.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('organisations.organisation_type_id') }}</dt>
            <dd>{{ optional($organisation->OrganisationType)->id }}</dd>
            <dt>{{ trans('organisations.name') }}</dt>
            <dd>{{ $organisation->name }}</dd>
            <dt>{{ trans('organisations.address') }}</dt>
            <dd>{{ $organisation->address }}</dd>
            <dt>{{ trans('organisations.phone_number') }}</dt>
            <dd>{{ $organisation->phone_number }}</dd>
            <dt>{{ trans('organisations.email') }}</dt>
            <dd>{{ $organisation->email }}</dd>
            <dt>{{ trans('organisations.description') }}</dt>
            <dd>{{ $organisation->description }}</dd>
            <dt>{{ trans('organisations.deleted_at') }}</dt>
            <dd>{{ $organisation->deleted_at }}</dd>
            <dt>{{ trans('organisations.created_at') }}</dt>
            <dd>{{ $organisation->created_at }}</dd>
            <dt>{{ trans('organisations.updated_at') }}</dt>
            <dd>{{ $organisation->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection