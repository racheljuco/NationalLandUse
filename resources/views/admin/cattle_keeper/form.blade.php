
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('cattleKeepers.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($cattleKeeper)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('cattleKeepers.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($cattleKeeper)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('livestock_id') ? 'has-error' : '' }}">
    <label for="livestock_id" class="col-md-2 control-label">{{ trans('cattleKeepers.livestock_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="livestock_id" name="livestock_id">
        	    <option value="" style="display: none;" {{ old('livestock_id', optional($cattleKeeper)->livestock_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('cattleKeepers.livestock_id__placeholder') }}</option>
        	@foreach ($Livestocks as $key => $Livestock)
			    <option value="{{ $key }}" {{ old('livestock_id', optional($cattleKeeper)->livestock_id) == $key ? 'selected' : '' }}>
			    	{{ $Livestock }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('livestock_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('number_of_cattle') ? 'has-error' : '' }}">
    <label for="number_of_cattle" class="col-md-2 control-label">{{ trans('cattleKeepers.number_of_cattle') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="number_of_cattle" type="number" id="number_of_cattle" value="{{ old('number_of_cattle', optional($cattleKeeper)->number_of_cattle) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('cattleKeepers.number_of_cattle__placeholder') }}" step="any">
        {!! $errors->first('number_of_cattle', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cattle_keeper_name') ? 'has-error' : '' }}">
    <label for="cattle_keeper_name" class="col-md-2 control-label">{{ trans('cattleKeepers.cattle_keeper_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="cattle_keeper_name" type="text" id="cattle_keeper_name" value="{{ old('cattle_keeper_name', optional($cattleKeeper)->cattle_keeper_name) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('cattleKeepers.cattle_keeper_name__placeholder') }}" step="any">
        {!! $errors->first('cattle_keeper_name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('division_name') ? 'has-error' : '' }}">
    <label for="division_name" class="col-md-2 control-label">{{ trans('cattleKeepers.division_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="division_name" type="text" id="division_name" value="{{ old('division_name', optional($cattleKeeper)->division_name) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('cattleKeepers.division_name__placeholder') }}" step="any">
        {!! $errors->first('division_name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

