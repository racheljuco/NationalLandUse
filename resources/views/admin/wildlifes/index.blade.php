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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('wildlifes.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.wildlife.create') }}" class="btn btn-success" title="{{ trans('wildlifes.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($wildlifes) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('wildlifes.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>{{ trans('wildlifes.type_wildlife_id') }}</th>
                            <th>{{ trans('wildlifes.name') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($wildlifes as $wildlife)
                        <tr>
                            <td>{{ optional($wildlife->wildlifeType)->name }}</td>
                            <td>{{ $wildlife->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('admin.wildlife.destroy', $wildlife->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.wildlife.show', $wildlife->id ) }}" class="btn btn-info" title="{{ trans('wildlifes.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.wildlife.edit', $wildlife->id ) }}" class="btn btn-primary" title="{{ trans('wildlifes.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('wildlifes.delete') }}" onclick="return confirm(&quot;{{ trans('wildlifes.confirm_delete') }}&quot;)">
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
            {!! $wildlifes->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection