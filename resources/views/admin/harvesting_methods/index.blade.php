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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('harvesting_methods.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.harvesting_method.create') }}" class="btn btn-success" title="{{ trans('harvesting_methods.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($harvestingMethods) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('harvesting_methods.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>{{ trans('harvesting_methods.name') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($harvestingMethods as $harvestingMethod)
                        <tr>
                                <td>{{ $harvestingMethod->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('admin.harvesting_method.destroy', $harvestingMethod->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.harvesting_method.show', $harvestingMethod->id ) }}" class="btn btn-info" title="{{ trans('harvesting_methods.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.harvesting_method.edit', $harvestingMethod->id ) }}" class="btn btn-primary" title="{{ trans('harvesting_methods.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('harvesting_methods.delete') }}" onclick="return confirm(&quot;{{ trans('harvesting_methods.confirm_delete') }}&quot;)">
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
            {!! $harvestingMethods->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection