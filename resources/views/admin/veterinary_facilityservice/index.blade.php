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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('veterinary_facilityservices.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.veterinary_facilityservice.create') }}" class="btn btn-success" title="{{ trans('veterinary_facilityservices.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($veterinaryFacilityservices) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('veterinary_facilityservices.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>{{ trans('veterinary_facilityservices.land_use_plan_id') }}</th>
                            <th>{{ trans('veterinary_facilityservices.village_id') }}</th>
                            <th>{{ trans('veterinary_facilityservices.name_division') }}</th>
                            <th>{{ trans('veterinary_facilityservices.name_ward') }}</th>
                            <th>{{ trans('veterinary_facilityservices.facility_service_name') }}</th>
                            <th>{{ trans('veterinary_facilityservices.total_facility_service') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($veterinaryFacilityservices as $veterinaryFacilityservice)
                        <tr>
                                <td>{{ optional($veterinaryFacilityservice->LandUsePlan)->name }}</td>
                            <td>{{ optional($veterinaryFacilityservice->Village)->village_name }}</td>
                            <td>{{ $veterinaryFacilityservice->name_division }}</td>
                            <td>{{ $veterinaryFacilityservice->name_ward }}</td>
                            <td>{{ $veterinaryFacilityservice->facility_service_name }}</td>
                            <td>{{ $veterinaryFacilityservice->total_facility_service}}</td>

                            <td>

                                <form method="POST" action="{!! route('admin.veterinary_facilityservice.destroy', $veterinaryFacilityservice->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.veterinary_facilityservice.show', $veterinaryFacilityservice->id ) }}" class="btn btn-info" title="{{ trans('veterinary_facilityservices.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.veterinary_facilityservice.edit', $veterinaryFacilityservice->id ) }}" class="btn btn-primary" title="{{ trans('veterinary_facilityservices.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('veterinary_facilityservices.delete') }}" onclick="return confirm(&quot;{{ trans('veterinary_facilityservices.confirm_delete') }}&quot;)">
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
            {!! $veterinaryFacilityservices->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection