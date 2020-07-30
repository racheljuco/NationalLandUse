
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('livestock_keepers.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($livestockKeeper)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('livestock_keepers.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($livestockKeeper)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('livestock_id') ? 'has-error' : '' }}">
    <label for="livestock_id" class="col-md-2 control-label">{{ trans('livestock_keepers.livestock_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="livestock_id" name="livestock_id">
        	    <option value="" style="display: none;" {{ old('livestock_id', optional($livestockKeeper)->livestock_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('livestock_keepers.livestock_id__placeholder') }}</option>
        	@foreach ($Livestocks as $key => $Livestock)
			    <option value="{{ $key }}" {{ old('livestock_id', optional($livestockKeeper)->livestock_id) == $key ? 'selected' : '' }}>
			    	{{ $Livestock }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('livestock_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('number_of_livestock') ? 'has-error' : '' }}">
    <label for="number_of_livestock" class="col-md-2 control-label">{{ trans('livestock_keepers.number_of_livestock') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="number_of_livestock" type="number" id="number_of_livestock" value="{{ old('number_of_livestock', optional($livestockKeeper)->number_of_livestock) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('livestock_keepers.number_of_livestock__placeholder') }}" step="any">
        {!! $errors->first('number_of_livestock', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('livestock_farm_name') ? 'has-error' : '' }}">
    <label for="livestock_farm_name" class="col-md-2 control-label">{{ trans('livestock_keepers.livestock_farm_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="livestock_farm_name" type="text" id="livestock_farm_name" value="{{ old('livestock_farm_name', optional($livestockKeeper)->livestock_farm_name) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('livestock_keepers.livestock_farm_name__placeholder') }}" step="any">
        {!! $errors->first('livestock_farm_name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

