@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($shapeFile->name) ? $shapeFile->name : 'Shape File' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.shape_file.destroy', $shapeFile->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.shape_file.index') }}" class="btn btn-primary" title="{{ trans('shape_files.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.shape_file.create') }}" class="btn btn-success" title="{{ trans('shape_files.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.shape_file.edit', $shapeFile->id ) }}" class="btn btn-primary" title="{{ trans('shape_files.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('shape_files.delete') }}" onclick="return confirm(&quot;{{ trans('shape_files.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('shape_files.land_use_plan_id') }}</dt>
            <dd>{{ optional($shapeFile->LandUsePlan)->name }}</dd>
            <dt>{{ trans('shape_files.name') }}</dt>
            <dd>{{ $shapeFile->name }}</dd>
            <dt>{{ trans('shape_files.filepath') }}</dt>
            <dd>{{ $shapeFile->filepath }}</dd>
            <dt>{{ trans('shape_files.deleted_at') }}</dt>
            <dd>{{ $shapeFile->deleted_at }}</dd>
            <dt>{{ trans('shape_files.created_at') }}</dt>
            <dd>{{ $shapeFile->created_at }}</dd>
            <dt>{{ trans('shape_files.updated_at') }}</dt>
            <dd>{{ $shapeFile->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection