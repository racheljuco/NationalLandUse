@extends('layouts.master')

@section('content')

    <div class="card">

        <div class="card-header">
            
            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('wildlife_conservations.create') }}</h3>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.wildlife_conservation.index') }}" class="btn btn-primary" title="{{ trans('wildlife_conservations.show_all') }}">
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

            <form method="POST" action="{{ route('admin.wildlife_conservation.store') }}" accept-charset="UTF-8" id="create_wildlife_conservation_form" name="create_wildlife_conservation_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('admin.wildlife_conservation.form', [
                                        'wildlifeConservation' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('wildlife_conservations.add') }}">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


