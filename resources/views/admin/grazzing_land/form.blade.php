
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('grazzing_lands.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($grazingLand)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('grazzing_lands.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($grazingLand)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('livestock_id') ? 'has-error' : '' }}">
    <label for="livestock_id" class="col-md-2 control-label">{{ trans('grazzing_lands.livestock_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="livestock_id" name="livestock_id">
        	    <option value="" style="display: none;" {{ old('livestock_id', optional($grazingLand)->livestock_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('grazzing_lands.livestock_id__placeholder') }}</option>
        	@foreach ($Livestocks as $key => $Livestock)
			    <option value="{{ $key }}" {{ old('livestock_id', optional($grazingLand)->livestock_id) == $key ? 'selected' : '' }}>
			    	{{ $Livestock }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('livestock_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name_division') ? 'has-error' : '' }}">
    <label for="name_division" class="col-md-2 control-label">{{ trans('grazzing_lands.name_division') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name_division" type="number" id="name_division" value="{{ old('name_division', optional($grazingLand)->name_division) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('grazzing_lands.name_division__placeholder') }}" step="any">
        {!! $errors->first('name_division', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name_ward') ? 'has-error' : '' }}">
    <label for="name_ward" class="col-md-2 control-label">{{ trans('grazzing_lands.name_ward') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name_ward" type="text" id="name_ward" value="{{ old('name_ward', optional($grazingLand)->name_ward) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('grazzing_lands.name_ward__placeholder') }}" step="any">
        {!! $errors->first('name_ward', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
    <label for="area" class="col-md-2 control-label">{{ trans('grazzing_lands.area') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="area" type="number" id="area" value="{{ old('area', optional($grazingLand)->area) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('grazzing_lands.area__placeholder') }}" step="any">
        {!! $errors->first('area', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('district_area') ? 'has-error' : '' }}">
    <label for="district_area" class="col-md-2 control-label">{{ trans('grazzing_lands.district_area') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="district_area" type="number" id="district_area" value="{{ old('district_area', optional($grazingLand)->district_area) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('grazzing_lands.district_area__placeholder') }}" step="any">
        {!! $errors->first('district_area', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

