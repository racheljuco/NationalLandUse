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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('fish_markets.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.fish_market.create') }}" class="btn btn-success" title="{{ trans('fish_markets.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($fishMarkets) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('fish_markets.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>{{ trans('fish_markets.land_use_plan_id') }}</th>
                            <th>{{ trans('fish_markets.village_id') }}</th>
                            <th>{{ trans('fish_markets.fish_id') }}</th>
                            <th>{{ trans('fish_markets.fish_market_name') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($fishMarkets as $fishMarket)
                        <tr>
                                <td>{{ optional($fishMarket->LandUsePlan)->name }}</td>
                            <td>{{ optional($fishMarket->Village)->village_name }}</td>
                            <td>{{ optional($fishMarket->Fish)->name }}</td>
                            <td>{{ $fishMarket->fish_market_name }}</td>
                            <td>

                                <form method="POST" action="{!! route('admin.fish_market.destroy', $fishMarket->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.fish_market.show', $fishMarket->id ) }}" class="btn btn-info" title="{{ trans('fish_markets.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.fish_market.edit', $fishMarket->id ) }}" class="btn btn-primary" title="{{ trans('fish_markets.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('fish_markets.delete') }}" onclick="return confirm(&quot;{{ trans('fish_markets.confirm_delete') }}&quot;)">
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
            {!! $fishMarkets->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection