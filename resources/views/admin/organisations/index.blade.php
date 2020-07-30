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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('organisations.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.organisation.create') }}" class="btn btn-success" title="{{ trans('organisations.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($organisations) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('organisations.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>{{ trans('organisations.organisation_type_id') }}</th>
                            <th>{{ trans('organisations.name') }}</th>
                            <th>{{ trans('organisations.address') }}</th>
                            <th>{{ trans('organisations.phone_number') }}</th>
                            <th>{{ trans('organisations.email') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($organisations as $organisation)
                        <tr>
                                <td>{{ optional($organisation->OrganisationType)->id }}</td>
                            <td>{{ $organisation->name }}</td>
                            <td>{{ $organisation->address }}</td>
                            <td>{{ $organisation->phone_number }}</td>
                            <td>{{ $organisation->email }}</td>

                            <td>

                                <form method="POST" action="{!! route('admin.organisation.destroy', $organisation->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.organisation.show', $organisation->id ) }}" class="btn btn-info" title="{{ trans('organisations.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.organisation.edit', $organisation->id ) }}" class="btn btn-primary" title="{{ trans('organisations.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('organisations.delete') }}" onclick="return confirm(&quot;{{ trans('organisations.confirm_delete') }}&quot;)">
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
            {!! $organisations->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection