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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('cultivated_land_yields.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.cultivated_land_yield.create') }}" class="btn btn-success" title="{{ trans('cultivated_land_yields.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($cultivatedLandYields) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('cultivated_land_yields.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>{{ trans('cultivated_land_yields.land_use_plan_id') }}</th>
                            <th>{{ trans('cultivated_land_yields.village_id') }}</th>
                            <th>{{ trans('cultivated_land_yields.crop_id') }}</th>
                            <th>{{ trans('cultivated_land_yields.actual_cultivated_land') }}</th>
                            <th>{{ trans('cultivated_land_yields.possible_yield') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cultivatedLandYields as $cultivatedLandYield)
                        <tr>
                                <td>{{ optional($cultivatedLandYield->LandUsePlan)->name }}</td>
                            <td>{{ optional($cultivatedLandYield->Village)->village_name }}</td>
                            <td>{{ optional($cultivatedLandYield->Crop)->name }}</td>
                            <td>{{ $cultivatedLandYield->actual_cultivated_land }}</td>
                            <td>{{ $cultivatedLandYield->possible_yield }}</td>

                            <td>

                                <form method="POST" action="{!! route('admin.cultivated_land_yield.destroy', $cultivatedLandYield->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.cultivated_land_yield.show', $cultivatedLandYield->id ) }}" class="btn btn-info" title="{{ trans('cultivated_land_yields.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.cultivated_land_yield.edit', $cultivatedLandYield->id ) }}" class="btn btn-primary" title="{{ trans('cultivated_land_yields.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('cultivated_land_yields.delete') }}" onclick="return confirm(&quot;{{ trans('cultivated_land_yields.confirm_delete') }}&quot;)">
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
            {!! $cultivatedLandYields->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection