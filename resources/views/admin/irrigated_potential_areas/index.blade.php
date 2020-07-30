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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('irrigated_potential_areas.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.irrigated_potential_area.create') }}" class="btn btn-success" title="{{ trans('irrigated_potential_areas.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($irrigatedPotentialAreas) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('irrigated_potential_areas.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>{{ trans('irrigated_potential_areas.land_use_plan_id') }}</th>
                         
                            <th>{{ trans('irrigated_potential_areas.name_division') }}</th>
                            <th>{{ trans('irrigated_potential_areas.name_ward') }}</th>
                            <th>{{ trans('irrigated_potential_areas.area') }}</th>
                            <th>{{ trans('irrigated_potential_areas.district_area') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($irrigatedPotentialAreas as $irrigatedPotentialArea)
                        <tr>
                                <td>{{ optional($irrigatedPotentialArea->LandUsePlan)->name }}</td>
                           
                            <td>{{ $irrigatedPotentialArea->name_division }}</td>
                            <td>{{ $irrigatedPotentialArea->name_ward }}</td>
                            <td>{{ $irrigatedPotentialArea->area }}</td>
                            <td>{{ $irrigatedPotentialArea->district_area }}</td>

                            <td>

                                <form method="POST" action="{!! route('admin.irrigated_potential_area.destroy', $irrigatedPotentialArea->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.irrigated_potential_area.show', $irrigatedPotentialArea->id ) }}" class="btn btn-info" title="{{ trans('irrigated_potential_areas.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.irrigated_potential_area.edit', $irrigatedPotentialArea->id ) }}" class="btn btn-primary" title="{{ trans('irrigated_potential_areas.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('irrigated_potential_areas.delete') }}" onclick="return confirm(&quot;{{ trans('irrigated_potential_areas.confirm_delete') }}&quot;)">
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
            {!! $irrigatedPotentialAreas->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection