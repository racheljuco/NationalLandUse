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

            <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ trans('districts.model_plural') }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('admin.district.create') }}" class="btn btn-success" title="{{ trans('districts.create') }}">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        
        @if(count($districts) == 0)
            <div class="card-body text-center">
                <h4>{{ trans('districts.none_available') }}</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>{{ trans('districts.region_id') }}</th>
                            <th>{{ trans('districts.district_name') }}</th>
                            <th>{{ trans('districts.code') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($districts as $district)
                        <tr>
                                <td>{{ optional($district->Region)->region_name }}</td>
                            <td>{{ $district->district_name }}</td>
                            <td>{{ $district->code }}</td>

                            <td>

                                <form method="POST" action="{!! route('admin.district.destroy', $district->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right" role="group">
                                        <a href="{{ route('admin.district.show', $district->id ) }}" class="btn btn-info" title="{{ trans('districts.show') }}">
                                            <i class=" fas fa-fw fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.district.edit', $district->id ) }}" class="btn btn-primary" title="{{ trans('districts.edit') }}">
                                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('districts.delete') }}" onclick="return confirm(&quot;{{ trans('districts.confirm_delete') }}&quot;)">
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
            {!! $districts->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection