<div class="form-group">
    <label for="level_id" class="col-md-2 control-label">Choose Level</label>
    <div class="col-md-10">
        <select class="form-control select2bs4" id="level_id" name="level_id" required="true">
        	    <option value="" style="display: none;">Choose Level</option>
        	@foreach ([1 => "Regional Level",2 => "District Level"] as $key => $name)
			    <option value="{{ $key }}">
			    	{{ $name }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('level_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('region_id') ? 'has-error' : '' }}" style="display: none;" id="reg_id" required="true">
    <label for="region_id" class="col-md-2 control-label">{{ trans('districts.region_id') }}</label>
    <div class="col-md-10">
        <select class="form-control select2bs4" id="region_id" name="region_id">
        	    <option value="" style="display: none;">{{ trans('districts.region_id__placeholder') }}</option>
        	@foreach ($regions as $key => $region)
			    <option value="{{ $key }}">
			    	{{ $region }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('region_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('district_id') ? 'has-error' : '' }}" style="display: none;" id="dis_id" required="true">
    <label for="district_id" class="col-md-2 control-label">{{ trans('wards.district_id') }}</label>
    <div class="col-md-10">
        <select class="form-control select2bs4" id="district_id" name="district_id">
        	    <option value="" >{{ trans('wards.district_id__placeholder') }}</option>
        </select>
        
        {!! $errors->first('district_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>


@push('script')
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
});
</script>
@endpush



