@extends('layouts.master')

@section('content')

    <div class="card">

        <div class="card-header">
            
            <h3  class="my-1 float-left"><i class="fas fa-pdf green"></i>&nbsp;Diary Keeper Report</h3>

            <div class="btn-group btn-group-sm float-right" role="group">
              
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

            <form method="POST" action="{{ route('admin.diary_keeper.report.report') }}" accept-charset="UTF-8" id="create_district_form" name="create_district_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('reports.livestock_and_fisheries.diary_keepers.form', [
                                        'regions' => $regions,
                
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Generate Report">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


@push('script')
<script>

$(document).ready(function(){
  
    $("#level_id").change(function(){
        var level_id = $(this).children("option:selected").val();
    
        if(level_id == 1){
            
            $("#reg_id").show();
            $("#dis_id").hide();
            $("#vil_id").hide();
        }
        if(level_id == 2){

            
            $("#reg_id").show();
            $("#dis_id").show();
            $("#vil_id").hide();
        }
        

    });

    $("#region_id").change(function(){
        var region_id = $(this).children("option:selected").val();
        if(region_id){
            $.ajax({
                url : '/admin/regions/getDistricts/' + region_id,
                type : 'GET',
                dataType: 'json',
                success: function(data){
                  $("#district_id").empty();
                  $("#district_id").append('<option value="">Choose District</option>');
                  $.each(data,function(key,value){
                    $("#district_id").append('<option value="' + key + '">'+ value + '</option>');

                  });

                }
            });
        }
    });


});
</script>

@endpush