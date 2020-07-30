@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header"> 

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Livestock Diseases' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.livestock_disease.destroy', $livestockDisease->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.livestock_disease.index') }}" class="btn btn-primary" title="{{ trans('livestock_diseases.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.livestock_disease.create') }}" class="btn btn-success" title="{{ trans('livestock_diseases.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.livestock_disease.edit', $livestockDisease->id ) }}" class="btn btn-primary" title="{{ trans('livestock_diseases.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('livestock_diseases.delete') }}" onclick="return confirm(&quot;{{ trans('livestock_diseases.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('livestock_diseases.land_use_plan_id') }}</dt>
            <dd>{{ optional($livestockDisease->LandUsePlan)->name }}</dd>
            <dt>{{ trans('livestock_diseases.village_id') }}</dt>
            <dd>{{ optional($livestockDisease->Village)->village_name }}</dd>
            <dt>{{ trans('livestock_diseases.name_division') }}</dt>
            <dd>{{ $livestockDisease->name_division }}</dd>
            <dt>{{ trans('livestock_diseases.name_ward') }}</dt>
            <dd>{{ $livestockDisease->name_ward }}</dd>
            <dt>{{ trans('livestock_diseases.livestock_id') }}</dt>
            <dd>{{ optional($livestockDisease->Livestock)->name }}</dd>
            <dt>{{ trans('livestock_diseases.livestock_disease_name') }}</dt>
            <dd>{{ $livestockDisease->livestock_disease_name }}</dd>
            <dt>{{ trans('livestock_diseases.created_at') }}</dt>
            <dd>{{ $livestockDisease->created_at }}</dd>
            <dt>{{ trans('livestock_diseases.updated_at') }}</dt>
            <dd>{{ $livestockDisease->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection