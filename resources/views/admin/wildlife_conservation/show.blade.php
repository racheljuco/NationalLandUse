@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header"> 

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Wildlife Conservations' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.wildlife_conservation.destroy', $wildlifeConservation->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.wildlife_conservation.index') }}" class="btn btn-primary" title="{{ trans('wildlife_conservations.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.wildlife_conservation.create') }}" class="btn btn-success" title="{{ trans('wildlife_conservations.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.wildlife_conservation.edit', $wildlifeConservation->id ) }}" class="btn btn-primary" title="{{ trans('wildlife_conservations.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('wildlife_conservations.delete') }}" onclick="return confirm(&quot;{{ trans('wildlife_conservations.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('wildlife_conservations.land_use_plan_id') }}</dt>
            <dd>{{ optional($wildlifeConservation->LandUsePlan)->name }}</dd>
            <dt>{{ trans('wildlife_conservations.village_id') }}</dt>
            <dd>{{ optional($wildlifeConservation->Village)->village_name }}</dd>
            <dt>{{ trans('wildlife_conservations.name_division') }}</dt>
            <dd>{{ $wildlifeConservation->name_division }}</dd>
            <dt>{{ trans('wildlife_conservations.name_ward') }}</dt>
            <dd>{{ $wildlifeConservation->name_ward }}</dd>
            <dt>{{ trans('wildlife_conservations.wildlife_id') }}</dt>
            <dd>{{ optional($wildlifeConservation->Wildlife)->name }}</dd>
            <dt>{{ trans('wildlife_conservations.wildlife_conservation_name') }}</dt>
            <dd>{{ $wildlifeConservation->wildlife_conservation_name }}</dd>
            <dt>{{ trans('wildlife_conservations.created_at') }}</dt>
            <dd>{{ $wildlifeConservation->created_at }}</dd>
            <dt>{{ trans('wildlife_conservations.updated_at') }}</dt>
            <dd>{{ $wildlifeConservation->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection