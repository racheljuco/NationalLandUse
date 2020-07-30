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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('mineral_details.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.mineral_detail.create') }}" class="btn btn-success" title="{{ trans('mineral_details.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($mineralDetails) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('mineral_details.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>{{ trans('mineral_details.land_use_plan_id') }}</th>
                            <th>{{ trans('mineral_details.village_id') }}</th>
                            <th>{{ trans('mineral_details.mineral_id') }}</th>
                            <th>{{ trans('mineral_details.mining_type') }}</th>
                            <th>{{ trans('mineral_details.mineral_exploitation_modality') }}</th>
                            <th>{{ trans('mineral_details.total_are_for_mining') }}</th>
                            <th>{{ trans('mineral_details.market_name') }}</th>
                            <th>{{ trans('mineral_details.year') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($mineralDetails as $mineralDetail)
                        <tr>
                            <td>{{ optional($mineralDetail->LandUsePlan)->name }}</td>
                            <td>{{ optional($mineralDetail->Village)->village_name }}</td>
                            <td>{{ optional($mineralDetail->Mineral)->name }}</td>
                            <td>{{ $mineralDetail->mining_type }}</td>
                            <td>{{ $mineralDetail->mineral_exploitation_modality }}</td>
                            <td>{{ $mineralDetail->total_are_for_mining }}</td>
                            <th>{{ trans('mineral_details.market_name') }}</th>
                            <td>{{ $mineralDetail->year }}</td>

                            <td>

                                <form method="POST" action="{!! route('admin.mineral_detail.destroy', $mineralDetail->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.mineral_detail.show', $mineralDetail->id ) }}" class="btn btn-info" title="{{ trans('mineral_details.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.mineral_detail.edit', $mineralDetail->id ) }}" class="btn btn-primary" title="{{ trans('mineral_details.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('mineral_details.delete') }}" onclick="return confirm(&quot;{{ trans('mineral_details.confirm_delete') }}&quot;)">
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
            {!! $mineralDetails->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection