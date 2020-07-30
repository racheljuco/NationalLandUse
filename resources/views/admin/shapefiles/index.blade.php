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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('shape_files.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.shape_file.create') }}" class="btn btn-success" title="{{ trans('shape_files.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($shapeFiles) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('shape_files.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>{{ trans('shape_files.land_use_plan_id') }}</th>
                            <th>{{ trans('shape_files.name') }}</th>
                            <th>file</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($shapeFiles as $shapeFile)
                        <tr>
                            <td>{{ optional($shapeFile->LandUsePlan)->name }}</td>
                            <td>{{ $shapeFile->name }}</td>
                            <td><a href="{{ asset('Storage/'.$shapeFile->filepath) }}"> <span class="right badge badge-success">Download</span></a></td>

                            <td>

                                <form method="POST" action="{!! route('admin.shape_file.destroy', $shapeFile->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.shape_file.show', $shapeFile->id ) }}" class="btn btn-info" title="{{ trans('shape_files.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.shape_file.edit', $shapeFile->id ) }}" class="btn btn-primary" title="{{ trans('shape_files.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('shape_files.delete') }}" onclick="return confirm(&quot;{{ trans('shape_files.confirm_delete') }}&quot;)">
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
            {!! $shapeFiles->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection