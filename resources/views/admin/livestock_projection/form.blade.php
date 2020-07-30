
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('livestock_projections.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($livestockProjection)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('livestock_projections.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($livestockProjection)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('livestock_id') ? 'has-error' : '' }}">
    <label for="livestock_id" class="col-md-2 control-label">{{ trans('livestock_projections.livestock_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="livestock_id" name="livestock_id">
        	    <option value="" style="display: none;" {{ old('livestock_id', optional($livestockProjection)->livestock_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('livestock_projections.livestock_id__placeholder') }}</option>
        	@foreach ($Livestocks as $key => $Livestock)
			    <option value="{{ $key }}" {{ old('livestock_id', optional($livestockProjection)->livestock_id) == $key ? 'selected' : '' }}>
			    	{{ $Livestock }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('livestock_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('actual_livestock') ? 'has-error' : '' }}">
    <label for="number_of_livestock_projected" class="col-md-2 control-label">{{ trans('livestock_projections.number_of_livestock_projected') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="number_of_livestock_projected" type="number" id="number_of_livestock_projected" value="{{ old('number_of_livestock_projected', optional($livestockProjection)->number_of_livestock_projected) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('livestock_projections.number_of_livestock_projected__placeholder') }}" step="any">
        {!! $errors->first('number_of_livestock_projected', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('landuse_projected') ? 'has-error' : '' }}">
    <label for="landuse_projected" class="col-md-2 control-label">{{ trans('livestock_projections.landuse_projected') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="landuse_projected" type="number" id="landuse_projected" value="{{ old('landuse_projected', optional($livestockProjection)->landuse_projected) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('livestock_projections.landuse_projected__placeholder') }}" step="any">
        {!! $errors->first('landuse_projected', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('grazing_land') ? 'has-error' : '' }}">
    <label for="grazing_land" class="col-md-2 control-label">{{ trans('livestock_projections.grazing_land') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="grazing_land" type="number" id="grazing_land" value="{{ old('grazing_land', optional($livestockProjection)->grazing_land) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('livestock_projections.grazing_land__placeholder') }}" step="any">
        {!! $errors->first('grazing_land', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>
