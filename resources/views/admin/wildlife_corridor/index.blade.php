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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('wildlife_corridors.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.wildlife_corridor.create') }}" class="btn btn-success" title="{{ trans('wildlife_corridors.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($wildlifeCorridors) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('wildlife_corridors.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>{{ trans('wildlife_corridors.land_use_plan_id') }}</th>
                            <th>{{ trans('wildlife_corridors.village_id') }}</th>
                            <th>{{ trans('wildlife_corridors.wildlife_id') }}</th>
                            <th>{{ trans('wildlife_corridors.wildlife_corridor_name') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($wildlifeCorridors as $wildlifeCorridor)
                        <tr>
                                <td>{{ optional($wildlifeCorridor->LandUsePlan)->name }}</td>
                            <td>{{ optional($wildlifeCorridor->Village)->village_name }}</td>
                            <td>{{ optional($wildlifeCorridor->Wildlife)->name }}</td>
                            <td>{{ $wildlifeCorridor->wildlife_corridor_name }}</td>
                            <td>

                                <form method="POST" action="{!! route('admin.wildlife_corridor.destroy', $wildlifeCorridor->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.wildlife_corridor.show', $wildlifeCorridor->id ) }}" class="btn btn-info" title="{{ trans('wildlife_corridors.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.wildlife_corridor.edit', $wildlifeCorridor->id ) }}" class="btn btn-primary" title="{{ trans('wildlife_corridors.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('wildlife_corridors.delete') }}" onclick="return confirm(&quot;{{ trans('wildlife_corridors.confirm_delete') }}&quot;)">
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
            {!! $wildlifeCorridors->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection