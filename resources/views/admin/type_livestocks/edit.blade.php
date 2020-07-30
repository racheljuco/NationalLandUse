@extends('layouts.master')

@section('content')

    <div class="card">
  
        <div class="card-header">

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ !empty($livestockType->name) ? $livestockType->name : 'Livestock Type' }}</h3>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('admin.livestock_type.index') }}" class="btn btn-primary" title="{{ trans('livestock_types.show_all') }}">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                </a>

                <a href="{{ route('admin.livestock_type.create') }}" class="btn btn-success" title="{{ trans('livestock_types.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>

            </div>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('admin.livestock_type.update', $livestockType->id) }}" id="edit_livestock_type_form" name="edit_livestock_type_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('admin.type_livestocks.form', [
                                        'livestockType' => $livestockType,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('livestock_types.update') }}">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection