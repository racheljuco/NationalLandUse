
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('cattle_distributions.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($cattleDistribution)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('cattle_distributions.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($cattleDistribution)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('livestock_id') ? 'has-error' : '' }}">
    <label for="livestock_id" class="col-md-2 control-label">{{ trans('cattle_distributions.livestock_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="livestock_id" name="livestock_id">
        	    <option value="" style="display: none;" {{ old('livestock_id', optional($cattleDistribution)->livestock_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('cattle_distributions.livestock_id__placeholder') }}</option>
        	@foreach ($Livestocks as $key => $Livestock)
			    <option value="{{ $key }}" {{ old('livestock_id', optional($cattleDistribution)->livestock_id) == $key ? 'selected' : '' }}>
			    	{{ $Livestock }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('livestock_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name_division') ? 'has-error' : '' }}">
    <label for="name_division" class="col-md-2 control-label">{{ trans('cattle_distributions.name_division') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name_division" type="text" id="name_division" value="{{ old('name_division', optional($cattleDistribution)->name_division) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('cattle_distributions.name_division__placeholder') }}" step="any">
        {!! $errors->first('name_division', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name_ward') ? 'has-error' : '' }}">
    <label for="name_ward" class="col-md-2 control-label">{{ trans('cattle_distributions.name_ward') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name_ward" type="text" id="name_ward" value="{{ old('name_ward', optional($cattleDistribution)->name_ward) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('cattle_distributions.name_ward__placeholder') }}" step="any">
        {!! $errors->first('name_ward', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>




<div class="form-group {{ $errors->has('total_indigineous_cattle') ? 'has-error' : '' }}">
    <label for="total_indigineous_cattle" class="col-md-2 control-label">{{ trans('cattle_distributions.total_indigineous_cattle') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="total_indigineous_cattle" type="number" id="total_indigineous_cattle" value="{{ old('total_indigineous_cattle', optional($cattleDistribution)->total_indigineous_cattle) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('cattle_distributions.total_indigineous_cattle__placeholder') }}" step="any">
        {!! $errors->first('total_indigineous_cattle', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('total_dairy_cattle') ? 'has-error' : '' }}">
    <label for="total_dairy_cattle" class="col-md-2 control-label">{{ trans('cattle_distributions.total_dairy_cattle') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="total_dairy_cattle" type="number" id="total_dairy_cattle" value="{{ old('total_dairy_cattle', optional($cattleDistribution)->total_dairy_cattle) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('cattle_distributions.total_dairy_cattle__placeholder') }}" step="any">
        {!! $errors->first('total_dairy_cattle', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('total_number_cattle') ? 'has-error' : '' }}">
    <label for="total_number_cattle" class="col-md-2 control-label">{{ trans('cattle_distributions.total_number_cattle') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="total_number_cattle" type="number" id="total_number_cattle" value="{{ old('total_number_cattle', optional($cattleDistribution)->total_number_cattle) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('cattle_distributions.total_number_cattle__placeholder') }}" step="any">
        {!! $errors->first('total_number_cattle', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('total_number_livestock_unit') ? 'has-error' : '' }}">
    <label for="total_number_livestock_unit" class="col-md-2 control-label">{{ trans('cattle_distributions.total_number_livestock_unit') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="total_number_livestock_unit" type="number" id="total_number_livestock_unit" value="{{ old('total_number_livestock_unit', optional($cattleDistribution)->total_number_livestock_unit) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('cattle_distributions.total_number_livestock_unit__placeholder') }}" step="any">
        {!! $errors->first('total_number_livestock_unit', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cattle_keepers_number') ? 'has-error' : '' }}">
    <label for="cattle_keepers_number" class="col-md-2 control-label">{{ trans('cattle_distributions.cattle_keepers_number') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="cattle_keepers_number" type="number" id="cattle_keepers_number" value="{{ old('cattle_keepers_number', optional($cattleDistribution)->cattle_keepers_number) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('cattle_distributions.cattle_keepers_number__placeholder') }}" step="any">
        {!! $errors->first('cattle_keepers_number', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>