
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('land_use_plan_fishs.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($landUsePlanFish)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('land_use_plan_fishs.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($landUsePlanFish)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('fish_id') ? 'has-error' : '' }}">
    <label for="fish_id" class="col-md-2 control-label">{{ trans('land_use_plan_fishs.fish_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="fish_id" name="fish_id" required="true">
        	    <option value="" style="display: none;" {{ old('fish_id', optional($landUsePlanFish)->fish_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('land_use_plan_fishs.fish_id__placeholder') }}</option>
        	@foreach ($Fishs as $key => $Fish)
			    <option value="{{ $key }}" {{ old('fish_id', optional($landUsePlanFish)->fish_id) == $key ? 'selected' : '' }}>
			    	{{ $Fish }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('fish_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

