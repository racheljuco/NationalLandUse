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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('grazzing_lands.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.grazzing_land.create') }}" class="btn btn-success" title="{{ trans('grazzing_lands.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($grazingLands) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('grazzing_lands.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>{{ trans('grazzing_lands.land_use_plan_id') }}</th>
                            <th>{{ trans('grazzing_lands.village_id') }}</th>
                            <th>{{ trans('grazzing_lands.name_division') }}</th>
                            <th>{{ trans('grazzing_lands.name_ward') }}</th>
                            <th>{{ trans('grazzing_lands.area') }}</th>
                            <th>{{ trans('grazzing_lands.district_area') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($grazingLands as $grazingLand)
                        <tr>
                                <td>{{ optional($grazingLand->LandUsePlan)->name }}</td>
                            <td>{{ optional($grazingLand->Village)->village_name }}</td>
                            <td>{{ $grazingLand->name_division }}</td>
                            <td>{{ $grazingLand->name_ward }}</td>
                            <td>{{ $grazingLand->area }}</td>
                            <td>{{ $grazingLand->district_area}}</td>

                            <td>

                                <form method="POST" action="{!! route('admin.grazzing_land.destroy', $grazingLand->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.grazzing_land.show', $grazingLand->id ) }}" class="btn btn-info" title="{{ trans('grazzing_lands.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.grazzing_land.edit', $grazingLand->id ) }}" class="btn btn-primary" title="{{ trans('grazzing_lands.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('grazzing_lands.delete') }}" onclick="return confirm(&quot;{{ trans('grazzing_lands.confirm_delete') }}&quot;)">
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
            {!! $grazingLands->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection