
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('land_use_plan_farm_inputs.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($landUsePlanFarmInput)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('land_use_plan_farm_inputs.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($landUsePlanFarmInput)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('farm_input_id') ? 'has-error' : '' }}">
    <label for="farm_input_id" class="col-md-2 control-label">{{ trans('land_use_plan_farm_inputs.farm_input_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="farm_input_id" name="farm_input_id" required="true">
        	    <option value="" style="display: none;" {{ old('farm_input_id', optional($landUsePlanFarmInput)->farm_input_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('land_use_plan_farm_inputs.farm_input_id__placeholder') }}</option>
        	@foreach ($FarmInputs as $key => $FarmInput)
			    <option value="{{ $key }}" {{ old('farm_input_id', optional($landUsePlanFarmInput)->farm_input_id) == $key ? 'selected' : '' }}>
			    	{{ $FarmInput }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('farm_input_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Status') ? 'has-error' : '' }}">
    <label for="Status" class="col-md-2 control-label">{{ trans('land_use_plan_farm_inputs.Status') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="Status_1">
            	<input id="Status_1" class="" name="Status" type="checkbox" value="1" {{ old('Status', optional($landUsePlanFarmInput)->Status) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('Status', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('type_input') ? 'has-error' : '' }}">
    <label for="type_input" class="col-md-2 control-label">{{ trans('land_use_plan_farm_inputs.type_input') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="type_input" type="text" id="type_input" value="{{ old('type_input', optional($landUsePlanFarmInput)->type_input) }}" maxlength="60" placeholder="{{ trans('land_use_plan_farm_inputs.type_input__placeholder') }}">
        {!! $errors->first('type_input', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('average_price') ? 'has-error' : '' }}">
    <label for="average_price" class="col-md-2 control-label">{{ trans('land_use_plan_farm_inputs.average_price') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="average_price" type="number" id="average_price" value="{{ old('average_price', optional($landUsePlanFarmInput)->average_price) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('land_use_plan_farm_inputs.average_price__placeholder') }}" step="any">
        {!! $errors->first('average_price', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('source_input') ? 'has-error' : '' }}">
    <label for="source_input" class="col-md-2 control-label">{{ trans('land_use_plan_farm_inputs.source_input') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="source_input" type="text" id="source_input" value="{{ old('source_input', optional($landUsePlanFarmInput)->source_input) }}" maxlength="60" placeholder="{{ trans('land_use_plan_farm_inputs.source_input__placeholder') }}">
        {!! $errors->first('source_input', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('availabity') ? 'has-error' : '' }}">
    <label for="availabity" class="col-md-2 control-label">{{ trans('land_use_plan_farm_inputs.availabity') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="availabity_1">
            	<input id="availabity_1" class="" name="availabity" type="checkbox" value="1" {{ old('availabity', optional($landUsePlanFarmInput)->availabity) == '1' ? 'checked' : '' }}>
                Satisfactory
            </label>
        </div>

        {!! $errors->first('availabity', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

