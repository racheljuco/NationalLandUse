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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('farming_techniques.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.farming_technique.create') }}" class="btn btn-success" title="{{ trans('farming_techniques.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($farmingTechniques) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('farming_techniques.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>{{ trans('farming_techniques.name') }}</th>
                            <th>{{ trans('farming_techniques.status') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($farmingTechniques as $farmingTechnique)
                        <tr>
                                <td>{{ $farmingTechnique->name }}</td>
                            <td>{{ ($farmingTechnique->status) ? 'Yes' : 'No' }}</td>

                            <td>

                                <form method="POST" action="{!! route('admin.farming_technique.destroy', $farmingTechnique->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.farming_technique.show', $farmingTechnique->id ) }}" class="btn btn-info" title="{{ trans('farming_techniques.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.farming_technique.edit', $farmingTechnique->id ) }}" class="btn btn-primary" title="{{ trans('farming_techniques.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('farming_techniques.delete') }}" onclick="return confirm(&quot;{{ trans('farming_techniques.confirm_delete') }}&quot;)">
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
            {!! $farmingTechniques->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection