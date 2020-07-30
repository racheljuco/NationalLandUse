
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('cultivated_land_yields.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($cultivatedLandYield)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('cultivated_land_yields.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($cultivatedLandYield)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('crop_id') ? 'has-error' : '' }}">
    <label for="crop_id" class="col-md-2 control-label">{{ trans('cultivated_land_yields.crop_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="crop_id" name="crop_id">
        	    <option value="" style="display: none;" {{ old('crop_id', optional($cultivatedLandYield)->crop_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('cultivated_land_yields.crop_id__placeholder') }}</option>
        	@foreach ($Crops as $key => $Crop)
			    <option value="{{ $key }}" {{ old('crop_id', optional($cultivatedLandYield)->crop_id) == $key ? 'selected' : '' }}>
			    	{{ $Crop }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('crop_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('actual_cultivated_land') ? 'has-error' : '' }}">
    <label for="actual_cultivated_land" class="col-md-2 control-label">{{ trans('cultivated_land_yields.actual_cultivated_land') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="actual_cultivated_land" type="number" id="actual_cultivated_land" value="{{ old('actual_cultivated_land', optional($cultivatedLandYield)->actual_cultivated_land) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('cultivated_land_yields.actual_cultivated_land__placeholder') }}" step="any">
        {!! $errors->first('actual_cultivated_land', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('possible_yield') ? 'has-error' : '' }}">
    <label for="possible_yield" class="col-md-2 control-label">{{ trans('cultivated_land_yields.possible_yield') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="possible_yield" type="number" id="possible_yield" value="{{ old('possible_yield', optional($cultivatedLandYield)->possible_yield) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('cultivated_land_yields.possible_yield__placeholder') }}" step="any">
        {!! $errors->first('possible_yield', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

