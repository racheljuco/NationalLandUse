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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('wildlife_conservations.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.wildlife_conservation.create') }}" class="btn btn-success" title="{{ trans('wildlife_conservations.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($wildlifeConservations) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('wildlife_conservations.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>{{ trans('wildlife_conservations.land_use_plan_id') }}</th>
                            <th>{{ trans('wildlife_conservations.village_id') }}</th>
                            <th>{{ trans('veterinary_facilityservices.name_ward') }}</th>
                            <th>{{ trans('wildlife_conservations.wildlife_id') }}</th>

                           
                            <th>{{ trans('wildlife_conservations.wildlife_conservation_type') }}</th>
                            <th>{{ trans('wildlife_conservations.wildlife_conservation_name') }}</th>
                            <th>{{ trans('wildlife_conservations.specie_available_name') }}</th>
                            <th>{{ trans('wildlife_conservations.total_number_species_available') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($wildlifeConservations as $wildlifeConservation)
                        <tr>
                                <td>{{ optional($wildlifeConservation->LandUsePlan)->name }}</td>
                            <td>{{ optional($wildlifeConservation->Village)->village_name }}</td>
                            <td>{{ $wildlifeConservation->name_ward }}</td>
                            <td>{{ optional($wildlifeConservation->Wildlife)->name }}</td>
                            <td>{{ $wildlifeConservation->wildlife_conservation_type }}</td>
                            <td>{{ $wildlifeConservation->wildlife_conservation_name }}</td>
                            <td>{{ $wildlifeConservation->specie_available_name }}</td>
                            <td>{{ $wildlifeConservation->total_number_species_available }}</td>
                            <td>

                                <form method="POST" action="{!! route('admin.wildlife_conservation.destroy', $wildlifeConservation->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.wildlife_conservation.show', $wildlifeConservation->id ) }}" class="btn btn-info" title="{{ trans('wildlife_conservations.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.wildlife_conservation.edit', $wildlifeConservation->id ) }}" class="btn btn-primary" title="{{ trans('wildlife_conservations.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('wildlife_conservations.delete') }}" onclick="return confirm(&quot;{{ trans('wildlife_conservations.confirm_delete') }}&quot;)">
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
            {!! $wildlifeConservations->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection