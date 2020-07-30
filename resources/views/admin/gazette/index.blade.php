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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('gazettes.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.gazette.create') }}" class="btn btn-success" title="{{ trans('gazettes.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($gazettes) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('gazettes.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>{{ trans('gazettes.land_use_plan_id') }}</th>
                            <th>{{ trans('gazettes.gn_number') }}</th>
                            <th>{{ trans('gazettes.title') }}</th>
                            <th>{{ trans('gazettes.published_date') }}</th>
                            <th>{{ trans('gazettes.expired_date') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($gazettes as $gazette)
                        <tr>
                                <td>{{ optional($gazette->LandUsePlan)->name }}</td>
                            <td>{{ $gazette->gn_number }}</td>
                            <td>{{ $gazette->title }}</td>
                            <td>{{ $gazette->published_date }}</td>
                            <td>{{ $gazette->expired_date }}</td>

                            <td>

                                <form method="POST" action="{!! route('admin.gazette.destroy', $gazette->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.gazette.show', $gazette->id ) }}" class="btn btn-info" title="{{ trans('gazettes.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.gazette.edit', $gazette->id ) }}" class="btn btn-primary" title="{{ trans('gazettes.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('gazettes.delete') }}" onclick="return confirm(&quot;{{ trans('gazettes.confirm_delete') }}&quot;)">
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
            {!! $gazettes->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection