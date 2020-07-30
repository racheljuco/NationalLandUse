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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('cattle_keepers.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.cattle_keeper.create') }}" class="btn btn-success" title="{{ trans('cattle_keepers.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($cattleKeepers) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('cattle_keepers.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>{{ trans('cattle_keepers.land_use_plan_id') }}</th>
                            <th>{{ trans('cattle_keepers.village_id') }}</th>
                            <th>{{ trans('cattle_keepers.livestock_id') }}</th>
                            <th>{{ trans('cattle_keepers.number_of_cattle') }}</th>
                            <th>{{ trans('cattle_keepers.cattle_keeper_name') }}</th>
                            <th>{{ trans('cattle_keepers.division_name') }}</th>
                            

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cattleKeepers as $cattleKeeper)
                        <tr>
                                <td>{{ optional($cattleKeeper->LandUsePlan)->name }}</td>
                            <td>{{ optional($cattleKeeper->Village)->village_name }}</td>
                            <td>{{ optional($cattleKeeper->Livestock)->name }}</td>
                            <td>{{ $cattleKeeper->number_of_cattle }}</td>
                            <td>{{ $cattleKeeper->cattle_keeper_name }}</td>
                            <td>{{ $cattleKeeper->division_name }}</td>
                           

                            <td>

                                <form method="POST" action="{!! route('admin.cattle_keeper.destroy', $cattleKeeper->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.cattle_keeper.show', $cattleKeeper->id ) }}" class="btn btn-info" title="{{ trans('cattle_keepers.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.cattle_keeper.edit', $cattleKeeper->id ) }}" class="btn btn-primary" title="{{ trans('cattle_keepers.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('cattle_keepers.delete') }}" onclick="return confirm(&quot;{{ trans('cattle_keepers.confirm_delete') }}&quot;)">
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
            {!! $cattleKeepers->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection