
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('land_use_plan_crops.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($landUsePlanCrop)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('land_use_plan_crops.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($landUsePlanCrop)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('crop_id') ? 'has-error' : '' }}">
    <label for="crop_id" class="col-md-2 control-label">{{ trans('land_use_plan_crops.crop_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="crop_id" name="crop_id" required="true">
        	    <option value="" style="display: none;" {{ old('crop_id', optional($landUsePlanCrop)->crop_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('land_use_plan_crops.crop_id__placeholder') }}</option>
        	@foreach ($Crops as $key => $Crop)
			    <option value="{{ $key }}" {{ old('crop_id', optional($landUsePlanCrop)->crop_id) == $key ? 'selected' : '' }}>
			    	{{ $Crop }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('crop_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

