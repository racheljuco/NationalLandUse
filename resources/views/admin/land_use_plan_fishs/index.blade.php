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

            <!-- <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('land_use_plan_fishs.model_plural') }}/Villages</h5> -->
            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;Major Fish/Villages</h5>
            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.land_use_plan_fish.create') }}" class="btn btn-success" title="{{ trans('land_use_plan_fishs.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($landUsePlanFishs) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('land_use_plan_fishs.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>S/no</th>
                            <th>{{ trans('land_use_plan_fishs.land_use_plan_id') }}</th>
                            <th>{{ trans('land_use_plan_fishs.fish_id') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($landUsePlanFishs as $index => $landUsePlanFish)
                        <tr>
                            <td>{{ ++$index }}</td>
                            <td>{{ optional($landUsePlanFish->LandUsePlan)->name }}</td>
                            <td>{{ optional($landUsePlanFish->Fish)->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('admin.land_use_plan_fish.destroy', $landUsePlanFish->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.land_use_plan_fish.show', $landUsePlanFish->id ) }}" class="btn btn-info" title="{{ trans('land_use_plan_fishs.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.land_use_plan_fish.edit', $landUsePlanFish->id ) }}" class="btn btn-primary" title="{{ trans('land_use_plan_fishs.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('land_use_plan_fishs.delete') }}" onclick="return confirm(&quot;{{ trans('land_use_plan_fishs.confirm_delete') }}&quot;)">
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
            {!! $landUsePlanFishs->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection