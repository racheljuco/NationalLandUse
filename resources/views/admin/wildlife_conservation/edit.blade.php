@extends('layouts.master')

@section('content')

    <div class="card">
  
        <div class="card-header">

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ !empty($title) ? $title : 'Wildlife Conservations' }}</h3>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('admin.wildlife_conservation.index') }}" class="btn btn-primary" title="{{ trans('wildlife_conservations.show_all') }}">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                </a>

                <a href="{{ route('admin.wildlife_conservation.create') }}" class="btn btn-success" title="{{ trans('wildlife_conservations.create') }}">
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

            <form method="POST" action="{{ route('admin.wildlife_conservation.update', $wildlifeConservation->id) }}" id="edit_wildlife_conservation_form" name="edit_wildlife_conservation_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('admin.wildlife_conservation.form', [
                                        'wildlifeConservation' => $wildlifeConservation,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('wildlife_conservations.update') }}">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection