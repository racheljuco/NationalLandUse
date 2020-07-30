
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('land_use_plan_wildlifes.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($landUsePlanWildlife)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('land_use_plan_wildlifes.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($landUsePlanWildlife)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('wildlife_id') ? 'has-error' : '' }}">
    <label for="wildlife_id" class="col-md-2 control-label">{{ trans('land_use_plan_wildlifes.wildlife_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="wildlife_id" name="wildlife_id" required="true">
        	    <option value="" style="display: none;" {{ old('wildlife_id', optional($landUsePlanWildlife)->wildlife_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('land_use_plan_wildlifes.wildlife_id__placeholder') }}</option>
        	@foreach ($wildlifes as $key => $Wildlife)
			    <option value="{{ $key }}" {{ old('wildlife_id', optional($landUsePlanWildlife)->wildlife_id) == $key ? 'selected' : '' }}>
			    	{{ $Wildlife }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('wildlife_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

