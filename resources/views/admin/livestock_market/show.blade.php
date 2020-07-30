@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header"> 

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Livestock Market' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.livestock_market.destroy', $livestockMarket->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.livestock_market.index') }}" class="btn btn-primary" title="{{ trans('livestock_markets.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.livestock_market.create') }}" class="btn btn-success" title="{{ trans('livestock_markets.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.livestock_market.edit', $livestockMarket->id ) }}" class="btn btn-primary" title="{{ trans('livestock_markets.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('livestock_markets.delete') }}" onclick="return confirm(&quot;{{ trans('livestock_markets.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('livestock_markets.land_use_plan_id') }}</dt>
            <dd>{{ optional($livestockMarket->LandUsePlan)->name }}</dd>
            <dt>{{ trans('livestock_markets.village_id') }}</dt>
            <dd>{{ optional($livestockMarket->Village)->village_name }}</dd>
            <dt>{{ trans('livestock_markets.livestock_id') }}</dt>
            <dd>{{ optional($livestockMarket->Livestock)->name }}</dd>
            <dt>{{ trans('livestock_markets.livestock_market_name') }}</dt>
            <dd>{{ $livestockMarket->livestock_market_name }}</dd>
            <dt>{{ trans('livestock_markets.created_at') }}</dt>
            <dd>{{ $livestockMarket->created_at }}</dd>
            <dt>{{ trans('livestock_markets.updated_at') }}</dt>
            <dd>{{ $livestockMarket->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection