@extends('layouts.master')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <i class=" fas fa-fw fa-check" aria-hidden="true"></i>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif 

    <div class="card">

        <div class="card-header">

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('livestock_markets.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.livestock_market.create') }}" class="btn btn-success" title="{{ trans('livestock_markets.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($livestockMarkets) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('livestock_markets.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>{{ trans('livestock_markets.land_use_plan_id') }}</th>
                            <th>{{ trans('livestock_markets.village_id') }}</th>
                            <th>{{ trans('livestock_markets.livestock_id') }}</th>
                            <th>{{ trans('livestock_markets.livestock_market_name') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($livestockMarkets as $livestockMarket)
                        <tr>
                                <td>{{ optional($livestockMarket->LandUsePlan)->name }}</td>
                            <td>{{ optional($livestockMarket->Village)->village_name }}</td>
                            <td>{{ optional($livestockMarket->Livestock)->name }}</td>
                            <td>{{ $livestockMarket->livestock_market_name }}</td>
                            <td>

                                <form method="POST" action="{!! route('admin.livestock_market.destroy', $livestockMarket->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.livestock_market.show', $livestockMarket->id ) }}" class="btn btn-info" title="{{ trans('livestock_markets.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.livestock_market.edit', $livestockMarket->id ) }}" class="btn btn-primary" title="{{ trans('livestock_markets.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('livestock_markets.delete') }}" onclick="return confirm(&quot;{{ trans('livestock_markets.confirm_delete') }}&quot;)">
                                            <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="card-footer">
            {!! $livestockMarkets->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection