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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('wildlife_types.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.wildlife_type.create') }}" class="btn btn-success" title="{{ trans('wildlife_types.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($wildlifeTypes) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('wildlife_types.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>{{ trans('wildlife_types.name') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($wildlifeTypes as $wildlifeType)
                        <tr>
                                <td>{{ $wildlifeType->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('admin.wildlife_type.destroy', $wildlifeType->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.wildlife_type.show', $wildlifeType->id ) }}" class="btn btn-info" title="{{ trans('wildlife_types.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.wildlife_type.edit', $wildlifeType->id ) }}" class="btn btn-primary" title="{{ trans('wildlife_types.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('wildlife_types.delete') }}" onclick="return confirm(&quot;{{ trans('wildlife_types.confirm_delete') }}&quot;)">
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
            {!! $wildlifeTypes->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection