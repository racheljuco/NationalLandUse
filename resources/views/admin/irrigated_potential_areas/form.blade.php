
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('irrigated_potential_areas.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($irrigatedPotentialArea)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('irrigated_potential_areas.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($irrigatedPotentialArea)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('name_division') ? 'has-error' : '' }}">
    <label for="name_division" class="col-md-2 control-label">{{ trans('irrigated_potential_areas.name_division') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name_division" type="text" id="name_division" value="{{ old('name_division', optional($irrigatedPotentialArea)->name_division) }}" maxlength="45" placeholder="{{ trans('irrigated_potential_areas.name_division__placeholder') }}">
        {!! $errors->first('name_division', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name_ward') ? 'has-error' : '' }}">
    <label for="name_ward" class="col-md-2 control-label">{{ trans('irrigated_potential_areas.name_ward') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name_ward" type="text" id="name_ward" value="{{ old('name_ward', optional($irrigatedPotentialArea)->name_ward) }}" maxlength="45" placeholder="{{ trans('irrigated_potential_areas.name_ward__placeholder') }}">
        {!! $errors->first('name_ward', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
    <label for="area" class="col-md-2 control-label">{{ trans('irrigated_potential_areas.area') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="area" type="number" id="area" value="{{ old('area', optional($irrigatedPotentialArea)->area) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('irrigated_potential_areas.area__placeholder') }}" step="any">
        {!! $errors->first('area', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('district_area') ? 'has-error' : '' }}">
    <label for="district_area" class="col-md-2 control-label">{{ trans('irrigated_potential_areas.district_area') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="district_area" type="number" id="district_area" value="{{ old('district_area', optional($irrigatedPotentialArea)->district_area) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('irrigated_potential_areas.district_area__placeholder') }}" step="any">
        {!! $errors->first('district_area', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

