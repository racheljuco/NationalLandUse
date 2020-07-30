
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('land_use_plan_farming_practices.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($landUsePlanFarmingPractice)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('land_use_plan_farming_practices.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($landUsePlanFarmingPractice)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('farming_practice_id') ? 'has-error' : '' }}">
    <label for="farming_practice_id" class="col-md-2 control-label">{{ trans('land_use_plan_farming_practices.farming_practice_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="farming_practice_id" name="farming_practice_id" required="true">
        	    <option value="" style="display: none;" {{ old('farming_practice_id', optional($landUsePlanFarmingPractice)->farming_practice_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('land_use_plan_farming_practices.farming_practice_id__placeholder') }}</option>
        	@foreach ($FarmingPractices as $key => $FarmingPractice)
			    <option value="{{ $key }}" {{ old('farming_practice_id', optional($landUsePlanFarmingPractice)->farming_practice_id) == $key ? 'selected' : '' }}>
			    	{{ $FarmingPractice }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('farming_practice_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

