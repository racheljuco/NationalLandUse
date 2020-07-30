@extends('layouts.master')

@section('content')

    <div class="card">

        <div class="card-header">
            
            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('farming_practices.create') }}</h3>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.farming_practice.index') }}" class="btn btn-primary" title="{{ trans('farming_practices.show_all') }}">
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

            <form method="POST" action="{{ route('admin.farming_practice.store') }}" accept-charset="UTF-8" id="create_farming_practice_form" name="create_farming_practice_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('admin.farming_practices.form', [
                                        'farmingPractice' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('farming_practices.add') }}">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


