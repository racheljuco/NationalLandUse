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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('land_use_plans.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.land_use_plan.create') }}" class="btn btn-success" title="{{ trans('land_use_plans.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($landUsePlans) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('land_use_plans.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>{{ trans('land_use_plans.village_id') }}</th>
                            <th>{{ trans('land_use_plans.land_use_plan_status_id') }}</th>
                            <th>{{ trans('land_use_plans.name') }}</th>
                            <th>{{ trans('land_use_plans.created_date') }}</th>
                            <th>{{ trans('land_use_plans.status') }}</th>
                            <th>File</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($landUsePlans as $landUsePlan)
                        <tr>
                            <td>{{ optional($landUsePlan->Village)->village_name }}</td>
                            <td>{{ optional($landUsePlan->LandUsePlanStatus)->name }}</td>
                            <td>{{ $landUsePlan->name }}</td>
                            <td>{{ $landUsePlan->created_date }}</td>
                            <td>{{ ($landUsePlan->status) ? 'Active' : 'Expired' }}</td>
                            
                            <td>
                            @if($landUsePlan->file != null)
                            <a href="{{ asset('Storage/'.$landUsePlan->file) }}"> <span class="right badge badge-success">Download</span></a>
                            @endif
                            </td>
                            
                            <td>

                                <form method="POST" action="{!! route('admin.land_use_plan.destroy', $landUsePlan->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.land_use_plan.show', $landUsePlan->id ) }}" class="btn btn-info" title="{{ trans('land_use_plans.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.land_use_plan.edit', $landUsePlan->id ) }}" class="btn btn-primary" title="{{ trans('land_use_plans.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('land_use_plans.delete') }}" onclick="return confirm(&quot;{{ trans('land_use_plans.confirm_delete') }}&quot;)">
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
            {!! $landUsePlans->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection