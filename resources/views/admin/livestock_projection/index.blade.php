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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('livestock_projections.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.livestock_projection.create') }}" class="btn btn-success" title="{{ trans('livestock_projections.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($livestockProjections) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('livestock_projections.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>{{ trans('livestock_projections.land_use_plan_id') }}</th>
                            <th>{{ trans('livestock_projections.village_id') }}</th>
                            <th>{{ trans('livestock_projections.livestock_id') }}</th>
                            <th>{{ trans('livestock_projections.number_of_livestock_projected') }}</th>
                            <th>{{ trans('livestock_projections.landuse_projected') }}</th>
                            <th>{{ trans('livestock_projections.grazing_land') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($livestockProjections as $livestockProjection)
                        <tr>
                                <td>{{ optional($livestockProjection->LandUsePlan)->name }}</td>
                            <td>{{ optional($livestockProjection->Village)->village_name }}</td>
                            <td>{{ optional($livestockProjection->Livestock)->name }}</td>
                            <td>{{ $livestockProjection->number_of_livestock_projected }}</td>
                            <td>{{ $livestockProjection->landuse_projected }}</td>
                            <td>{{ $livestockProjection->grazing_land }}</td>

                            <td>

                                <form method="POST" action="{!! route('admin.livestock_projection.destroy', $livestockProjection->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.livestock_projection.show', $livestockProjection->id ) }}" class="btn btn-info" title="{{ trans('livestock_projections.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.livestock_projection.edit', $livestockProjection->id ) }}" class="btn btn-primary" title="{{ trans('livestock_projections.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('livestock_projections.delete') }}" onclick="return confirm(&quot;{{ trans('livestock_projections.confirm_delete') }}&quot;)">
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
            {!! $livestockProjections->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection