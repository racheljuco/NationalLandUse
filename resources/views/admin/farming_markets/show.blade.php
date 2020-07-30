@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($farmingMarket->name) ? $farmingMarket->name : 'Farming Market' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.farming_market.destroy', $farmingMarket->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.farming_market.index') }}" class="btn btn-primary" title="{{ trans('farming_markets.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.farming_market.create') }}" class="btn btn-success" title="{{ trans('farming_markets.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.farming_market.edit', $farmingMarket->id ) }}" class="btn btn-primary" title="{{ trans('farming_markets.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('farming_markets.delete') }}" onclick="return confirm(&quot;{{ trans('farming_markets.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('farming_markets.name') }}</dt>
            <dd>{{ $farmingMarket->name }}</dd>
            <dt>{{ trans('farming_markets.description') }}</dt>
            <dd>{{ $farmingMarket->description }}</dd>
            <dt>{{ trans('farming_markets.created_at') }}</dt>
            <dd>{{ $farmingMarket->created_at }}</dd>
            <dt>{{ trans('farming_markets.updated_at') }}</dt>
            <dd>{{ $farmingMarket->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection