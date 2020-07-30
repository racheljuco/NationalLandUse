@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Diary Keepers' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.diary_keeper.destroy', $diaryKeeper->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.diary_keeper.index') }}" class="btn btn-primary" title="{{ trans('diary_keepers.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.diary_keeper.create') }}" class="btn btn-success" title="{{ trans('diary_keepers.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.diary_keeper.edit', $diaryKeeper->id ) }}" class="btn btn-primary" title="{{ trans('diary_keepers.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('diary_keepers.delete') }}" onclick="return confirm(&quot;{{ trans('diary_keepers.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('diary_keepers.land_use_plan_id') }}</dt>
            <dd>{{ optional($diaryKeeper->LandUsePlan)->name }}</dd>
            <dt>{{ trans('diary_keepers.village_id') }}</dt>
            <dd>{{ optional($diaryKeeper->Village)->village_name }}</dd>
            <dt>{{ trans('diary_keepers.ward_id') }}</dt>
            <dd>{{ optional($diaryKeeper->Ward)->name }}</dd>
            <dt>{{ trans('diary_keepers.livestock_id') }}</dt>
            <dd>{{ optional($diaryKeeper->Livestock)->name }}</dd>
            <dt>{{ trans('diary_keepers.number_of_livestock') }}</dt>
            <dd>{{ $diaryKeeper->number_of_livestock }}</dd>
            <dt>{{ trans('diary_keepers.diary_farm_name') }}</dt>
            <dd>{{ $diaryKeeper->diary_farm_name }}</dd>
            <dt>{{ trans('diary_keepers.created_at') }}</dt>
            <dd>{{ $diaryKeeper->created_at }}</dd>
            <dt>{{ trans('diary_keepers.updated_at') }}</dt>
            <dd>{{ $diaryKeeper->updated_at }}</dd>
            
        </dl>

    </div>
</div>

@endsection