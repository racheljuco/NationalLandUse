@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Mining Activities ' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.mineral_detail.destroy', $mineralDetail->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.mineral_detail.index') }}" class="btn btn-primary" title="{{ trans('mineral_details.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.mineral_detail.create') }}" class="btn btn-success" title="{{ trans('mineral_details.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.mineral_detail.edit', $mineralDetail->id ) }}" class="btn btn-primary" title="{{ trans('mineral_details.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('mineral_details.delete') }}" onclick="return confirm(&quot;{{ trans('mineral_details.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('mineral_details.land_use_plan_id') }}</dt>
            <dd>{{ optional($mineralDetail->LandUsePlan)->name }}</dd>
            <dt>{{ trans('mineral_details.village_id') }}</dt>
            <dd>{{ optional($mineralDetail->Village)->village_name }}</dd>
            <dt>{{ trans('mineral_details.mineral_id') }}</dt>
            <dd>{{ optional($mineralDetail->Mineral)->name }}</dd>
            <dt>{{ trans('mineral_details.mining_type') }}</dt>
            <dd>{{ $mineralDetail->mining_type }}</dd>
            <dt>{{ trans('mineral_details.mineral_exploitation_modality') }}</dt>
            <dd>{{ $mineralDetail->mineral_exploitation_modality }}</dd>
            <dt>{{ trans('mineral_details.total_are_for_mining') }}</dt>
            <dd>{{ $mineralDetail->total_are_for_mining }}</dd>
            <dt>{{ trans('mineral_details.market_name') }}</dt>
            <dd>{{ $mineralDetail->market_name }}</dd>
            <dt>{{ trans('mineral_details.year') }}</dt>
            <dd>{{ $mineralDetail->year }}</dd>
            <dt>{{ trans('mineral_details.created_at') }}</dt>
            <dd>{{ $mineralDetail->created_at }}</dd>
            <dt>{{ trans('mineral_details.updated_at') }}</dt>
            <dd>{{ $mineralDetail->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection