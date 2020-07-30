
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('land_use_plan_minerals.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($landUsePlanMineral)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('land_use_plan_minerals.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($landUsePlanMineral)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('mineral_id') ? 'has-error' : '' }}">
    <label for="mineral_id" class="col-md-2 control-label">{{ trans('land_use_plan_minerals.mineral_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="mineral_id" name="mineral_id" required="true">
        	    <option value="" style="display: none;" {{ old('mineral_id', optional($landUsePlanMineral)->mineral_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('land_use_plan_minerals.mineral_id__placeholder') }}</option>
        	@foreach ($minerals as $key => $Mineral)
			    <option value="{{ $key }}" {{ old('mineral_id', optional($landUsePlanMineral)->mineral_id) == $key ? 'selected' : '' }}>
			    	{{ $Mineral }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('mineral_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

