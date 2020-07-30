
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('area_under_irrigations.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($areaUnderIrrigation)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('area_under_irrigations.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($areaUnderIrrigation)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('area_irrigation') ? 'has-error' : '' }}">
    <label for="area_irrigation" class="col-md-2 control-label">{{ trans('area_under_irrigations.area_irrigation') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="area_irrigation" type="number" id="area_irrigation" value="{{ old('area_irrigation', optional($areaUnderIrrigation)->area_irrigation) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('area_under_irrigations.area_irrigation__placeholder') }}" step="any">
        {!! $errors->first('area_irrigation', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('area_under_irrigation') ? 'has-error' : '' }}">
    <label for="area_under_irrigation" class="col-md-2 control-label">{{ trans('area_under_irrigations.area_under_irrigation') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="area_under_irrigation" type="number" id="area_under_irrigation" value="{{ old('area_under_irrigation', optional($areaUnderIrrigation)->area_under_irrigation) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('area_under_irrigations.area_under_irrigation__placeholder') }}" step="any">
        {!! $errors->first('area_under_irrigation', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('perfomance') ? 'has-error' : '' }}">
    <label for="perfomance" class="col-md-2 control-label">{{ trans('area_under_irrigations.perfomance') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="perfomance" type="number" id="perfomance" value="{{ old('perfomance', optional($areaUnderIrrigation)->perfomance) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('area_under_irrigations.perfomance__placeholder') }}" step="any">
        {!! $errors->first('perfomance', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

