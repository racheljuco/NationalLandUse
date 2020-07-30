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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('fish_details.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.fish_detail.create') }}" class="btn btn-success" title="{{ trans('fish_details.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($fishDetails) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('fish_details.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>{{ trans('fish_details.land_use_plan_id') }}</th>
                            <th>{{ trans('fish_details.village_id') }}</th>
                            <th>{{ trans('fish_details.fish_id') }}</th>
                            <th>{{ trans('fish_details.fishing_place') }}</th>
                            <th>{{ trans('fish_details.fisher_number') }}</th>
                            <th>{{ trans('fish_details.fish_amount') }}</th>
                            <th>{{ trans('fish_details.year') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($fishDetails as $fishDetail)
                        <tr>
                            <td>{{ optional($fishDetail->LandUsePlan)->name }}</td>
                            <td>{{ optional($fishDetail->Village)->village_name }}</td>
                            <td>{{ optional($fishDetail->Fish)->name }}</td>
                            <td>{{ $fishDetail->fishing_place }}</td>
                            <td>{{ $fishDetail->fisher_number }}</td>
                            <td>{{ $fishDetail->fish_amount }}</td>
                            <td>{{ $fishDetail->year }}</td>

                            <td>

                                <form method="POST" action="{!! route('admin.fish_detail.destroy', $fishDetail->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.fish_detail.show', $fishDetail->id ) }}" class="btn btn-info" title="{{ trans('fish_details.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.fish_detail.edit', $fishDetail->id ) }}" class="btn btn-primary" title="{{ trans('fish_details.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('fish_details.delete') }}" onclick="return confirm(&quot;{{ trans('fish_details.confirm_delete') }}&quot;)">
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
            {!! $fishDetails->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection