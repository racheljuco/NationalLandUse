@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Fishing Activities ' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.fish_detail.destroy', $fishDetail->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.fish_detail.index') }}" class="btn btn-primary" title="{{ trans('fish_details.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.fish_detail.create') }}" class="btn btn-success" title="{{ trans('fish_details.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.fish_detail.edit', $fishDetail->id ) }}" class="btn btn-primary" title="{{ trans('fish_details.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('fish_details.delete') }}" onclick="return confirm(&quot;{{ trans('fish_details.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('fish_details.land_use_plan_id') }}</dt>
            <dd>{{ optional($fishDetail->LandUsePlan)->name }}</dd>
            <dt>{{ trans('fish_details.village_id') }}</dt>
            <dd>{{ optional($fishDetail->Village)->village_name }}</dd>
            <dt>{{ trans('fish_details.fish_id') }}</dt>
            <dd>{{ optional($fishDetail->Fish)->name }}</dd>
            <dt>{{ trans('fish_details.fishing_place') }}</dt>
            <dd>{{ $fishDetail->fishing_place }}</dd>
            <dt>{{ trans('fish_details.fisher_number') }}</dt>
            <dd>{{ $fishDetail->fisher_number }}</dd>
            <dt>{{ trans('fish_details.fish_amount') }}</dt>
            <dd>{{ $fishDetail->fish_amount }}</dd>
            <dt>{{ trans('fish_details.year') }}</dt>
            <dd>{{ $fishDetail->year }}</dd>
            <dt>{{ trans('fish_details.created_at') }}</dt>
            <dd>{{ $fishDetail->created_at }}</dd>
            <dt>{{ trans('fish_details.updated_at') }}</dt>
            <dd>{{ $fishDetail->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection