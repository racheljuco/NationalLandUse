@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header"> 

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Fish Market' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.fish_market.destroy', $fishMarket->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.fish_market.index') }}" class="btn btn-primary" title="{{ trans('fish_markets.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.fish_market.create') }}" class="btn btn-success" title="{{ trans('fish_markets.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.fish_market.edit', $fishMarket->id ) }}" class="btn btn-primary" title="{{ trans('fish_markets.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('fish_markets.delete') }}" onclick="return confirm(&quot;{{ trans('fish_markets.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('fish_markets.land_use_plan_id') }}</dt>
            <dd>{{ optional($fishMarket->LandUsePlan)->name }}</dd>
            <dt>{{ trans('fish_markets.village_id') }}</dt>
            <dd>{{ optional($fishMarket->Village)->village_name }}</dd>
            <dt>{{ trans('fish_markets.fish_id') }}</dt>
            <dd>{{ optional($fishMarket->Fish)->name }}</dd>
            <dt>{{ trans('fish_markets.fish_market_name') }}</dt>
            <dd>{{ $fishMarket->fish_market_name }}</dd>
            <dt>{{ trans('fish_markets.created_at') }}</dt>
            <dd>{{ $fishMarket->created_at }}</dd>
            <dt>{{ trans('fish_markets.updated_at') }}</dt>
            <dd>{{ $fishMarket->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection