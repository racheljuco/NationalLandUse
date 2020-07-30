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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('cattle_distributions.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.cattle_distribution.create') }}" class="btn btn-success" title="{{ trans('cattle_distributions.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($cattleDistributions) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('cattle_distributions.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>{{ trans('cattle_distributions.land_use_plan_id') }}</th>
                            <th>{{ trans('cattle_distributions.village_id') }}</th>
                            <th>{{ trans('cattle_distributions.name_division') }}</th>
                            <th>{{ trans('cattle_distributions.name_ward') }}</th>
                            <th>{{ trans('cattle_distributions.total_indigineous_cattle') }}</th>
                            <th>{{ trans('cattle_distributions.total_dairy_cattle') }}</th>
                            <th>{{ trans('cattle_distributions.total_number_cattle') }}</th>
                            <th>{{ trans('cattle_distributions.total_number_livestock_unit') }}</th>
                            <th>{{ trans('cattle_distributions.cattle_keepers_number') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cattleDistributions as $cattleDistribution)
                        <tr>
                                <td>{{ optional($cattleDistribution->LandUsePlan)->name }}</td>
                            <td>{{ optional($cattleDistribution->Village)->village_name }}</td>
                            <td>{{ $cattleDistribution->name_division }}</td>
                            <td>{{ $cattleDistribution->name_ward }}</td>
                            <td>{{ $cattleDistribution->total_indigineous_cattle }}</td>
                            <td>{{ $cattleDistribution->total_dairy_cattle}}</td>
                            <td>{{ $cattleDistribution->total_number_cattle }}</td>
                            <td>{{ $cattleDistribution->total_number_livestock_unit}}</td>
                            <td>{{ $cattleDistribution->cattle_keepers_number}}</td>

                            <td>

                                <form method="POST" action="{!! route('admin.cattle_distribution.destroy', $cattleDistribution->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.cattle_distribution.show', $cattleDistribution->id ) }}" class="btn btn-info" title="{{ trans('cattle_distributions.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.cattle_distribution.edit', $cattleDistribution->id ) }}" class="btn btn-primary" title="{{ trans('cattle_distributions.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('cattle_distributions.delete') }}" onclick="return confirm(&quot;{{ trans('cattle_distributions.confirm_delete') }}&quot;)">
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
            {!! $cattleDistributions->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection