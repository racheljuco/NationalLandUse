
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('land_use_plan_farming_techniques.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($landUsePlanFarmingTechnique)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('land_use_plan_farming_techniques.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($landUsePlanFarmingTechnique)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('farming_technique_id') ? 'has-error' : '' }}">
    <label for="farming_technique_id" class="col-md-2 control-label">{{ trans('land_use_plan_farming_techniques.farming_technique_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="farming_technique_id" name="farming_technique_id" required="true">
        	    <option value="" style="display: none;" {{ old('farming_technique_id', optional($landUsePlanFarmingTechnique)->farming_technique_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('land_use_plan_farming_techniques.farming_technique_id__placeholder') }}</option>
        	@foreach ($FarmingTechniques as $key => $FarmingTechnique)
			    <option value="{{ $key }}" {{ old('farming_technique_id', optional($landUsePlanFarmingTechnique)->farming_technique_id) == $key ? 'selected' : '' }}>
			    	{{ $FarmingTechnique }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('farming_technique_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

