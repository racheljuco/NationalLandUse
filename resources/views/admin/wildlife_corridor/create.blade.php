@extends('layouts.master')

@section('content')

    <div class="card">

        <div class="card-header">
            
            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('wildlife_corridors.create') }}</h3>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.wildlife_corridor.index') }}" class="btn btn-primary" title="{{ trans('wildlife_corridors.show_all') }}">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
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

            <form method="POST" action="{{ route('admin.wildlife_corridor.store') }}" accept-charset="UTF-8" id="create_wildlife_corridor_form" name="create_wildlife_corridor_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('admin.wildlife_corridor.form', [
                                        'wildlifeCorridor' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('wildlife_corridors.add') }}">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


