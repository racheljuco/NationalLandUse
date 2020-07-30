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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('livestock_keepers.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.livestock_keeper.create') }}" class="btn btn-success" title="{{ trans('livestock_keepers.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($livestockKeepers) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('livestock_keepers.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>{{ trans('livestock_keepers.land_use_plan_id') }}</th>
                            <th>{{ trans('livestock_keepers.village_id') }}</th>
                            <th>{{ trans('livestock_keepers.livestock_id') }}</th>
                            <th>{{ trans('livestock_keepers.number_of_livestock') }}</th>
                            <th>{{ trans('livestock_keepers.livestock_farm_name') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($livestockKeepers as $livestockKeeper)
                        <tr>
                                <td>{{ optional($livestockKeeper->LandUsePlan)->name }}</td>
                            <td>{{ optional($livestockKeeper->Village)->village_name }}</td>
                            <td>{{ optional($livestockKeeper->Livestock)->name }}</td>
                            <td>{{ $livestockKeeper->number_of_livestock }}</td>
                            <td>{{ $livestockKeeper->livestock_farm_name }}</td>

                            <td>

                                <form method="POST" action="{!! route('admin.livestock_keeper.destroy', $livestockKeeper->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.livestock_keeper.show', $livestockKeeper->id ) }}" class="btn btn-info" title="{{ trans('livestock_keepers.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.livestock_keeper.edit', $livestockKeeper->id ) }}" class="btn btn-primary" title="{{ trans('livestock_keepers.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('livestock_keepers.delete') }}" onclick="return confirm(&quot;{{ trans('livestock_keepers.confirm_delete') }}&quot;)">
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
            {!! $livestockKeepers->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection