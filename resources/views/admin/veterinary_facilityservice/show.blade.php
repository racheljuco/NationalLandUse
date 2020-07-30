@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Veterinary Facilities and Services' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.veterinary_facilityservice.destroy', $veterinaryFacilityservice->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.veterinary_facilityservice.index') }}" class="btn btn-primary" title="{{ trans('veterinary_facilityservices.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.veterinary_facilityservice.create') }}" class="btn btn-success" title="{{ trans('veterinary_facilityservices.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.veterinary_facilityservice.edit', $veterinaryFacilityservice->id ) }}" class="btn btn-primary" title="{{ trans('veterinary_facilityservices.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('veterinary_facilityservices.delete') }}" onclick="return confirm(&quot;{{ trans('veterinary_facilityservices.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('veterinary_facilityservices.land_use_plan_id') }}</dt>
            <dd>{{ optional($veterinaryFacilityservice->LandUsePlan)->name }}</dd>
            <dt>{{ trans('veterinary_facilityservices.village_id') }}</dt>
            <dd>{{ optional($veterinaryFacilityservice->Village)->village_name }}</dd>
            <dt>{{ trans('veterinary_facilityservices.livestock_id') }}</dt>
            <dd>{{ optional($veterinaryFacilityservice->Livestock)->name }}</dd>area
            <dt>{{ trans('veterinary_facilityservices.name_division') }}</dt>
            <dd>{{ $veterinaryFacilityservice->name_division }}</dd>
            <dt>{{ trans('veterinary_facilityservices.name_ward') }}</dt>
            <dd>{{ $veterinaryFacilityservice->name_ward }}</dd>
            <dt>{{ trans('veterinary_facilityservices.facility_service_name') }}</dt>
            <dd>{{ $veterinaryFacilityservice->facility_service_name }}</dd>
            <dt>{{ trans('veterinary_facilityservices.total_facility_service') }}</dt>
            <dd>{{ $veterinaryFacilityservice->total_facility_service }}</dd>
            <dt>{{ trans('veterinary_facilityservices.created_at') }}</dt>
            <dd>{{ $veterinaryFacilityservice->created_at }}</dd>
            <dt>{{ trans('veterinary_facilityservices.updated_at') }}</dt>
            <dd>{{ $veterinaryFacilityservice->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection