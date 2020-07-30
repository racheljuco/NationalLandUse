@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h3  class="my-1 float-left"><i class="fas fa-angle-double-right green"></i>&nbsp;{{ isset($title) ? $title : 'Livestock Products' }}</h3>

        <div class="float-right">

            <form method="POST" action="{!! route('admin.livestock_product.destroy', $livestockProduct->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.livestock_product.index') }}" class="btn btn-primary" title="{{ trans('livestock_products.show_all') }}">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.livestock_product.create') }}" class="btn btn-success" title="{{ trans('livestock_products.create') }}">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    </a>
                    
                    <a href="{{ route('admin.livestock_product.edit', $livestockProduct->id ) }}" class="btn btn-primary" title="{{ trans('livestock_products.edit') }}">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('livestock_products.delete') }}" onclick="return confirm(&quot;{{ trans('livestock_products.confirm_delete') }}?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('livestock_products.land_use_plan_id') }}</dt>
            <dd>{{ optional($livestockProduct->LandUsePlan)->name }}</dd>
            <dt>{{ trans('livestock_products.village_id') }}</dt>
            <dd>{{ optional($livestockProduct->Village)->village_name }}</dd>
            <dt>{{ trans('livestock_products.livestock_id') }}</dt>
            <dd>{{ optional($livestockProduct->Livestock)->name }}</dd>
            <dt>{{ trans('livestock_products.slaughted') }}</dt>
            <dd>{{ $livestockProduct->slaughted }}</dd>
            <dt>{{ trans('livestock_products.eggs') }}</dt>
            <dd>{{ $livestockProduct->eggs }}</dd>
            <dt>{{ trans('livestock_products.milk') }}</dt>
            <dd>{{ $livestockProduct->milk }}</dd>
            <dt>{{ trans('livestock_products.created_at') }}</dt>
            <dd>{{ $livestockProduct->created_at }}</dd>
            <dt>{{ trans('livestock_products.updated_at') }}</dt>
            <dd>{{ $livestockProduct->updated_at }}</dd>

        </dl>

    </div>
</div>
 <div class="row">
          
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Percentage  of livestock products per Area</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="chart">
                    
                      <!-- House Category Canvas -->
                      <div id="pieChart" style="height: 370px; max-width: 500px; margin: 0px auto;"></div>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  
                  
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!--Clients House Renting-->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Percentage of livestocks per area</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="chart">
                      <!-- House Category Canvas -->
                      <div id="chartContainer" style="height: 370px; max-width: 500px; margin: 0px auto;"></div>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  
                  
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

@endsection