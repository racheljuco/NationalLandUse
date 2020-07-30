
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('land_use_plan_livestocks.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($landUsePlanLivestock)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('land_use_plan_livestocks.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($landUsePlanLivestock)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('livestock_id') ? 'has-error' : '' }}">
    <label for="livestock_id" class="col-md-2 control-label">{{ trans('land_use_plan_livestocks.livestock_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="livestock_id" name="livestock_id" required="true">
        	    <option value="" style="display: none;" {{ old('livestock_id', optional($landUsePlanLivestock)->livestock_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('land_use_plan_livestocks.livestock_id__placeholder') }}</option>
        	@foreach ($Livestocks as $key => $Livestock)
			    <option value="{{ $key }}" {{ old('livestock_id', optional($landUsePlanLivestock)->livestock_id) == $key ? 'selected' : '' }}>
			    	{{ $Livestock }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('livestock_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

