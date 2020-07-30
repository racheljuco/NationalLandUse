
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('wildlife_conservations.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($wildlifeConservation)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('wildlife_conservations.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($wildlifeConservation)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach    
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name_division') ? 'has-error' : '' }}">
    <label for="name_division" class="col-md-2 control-label">{{ trans('wildlife_conservations.name_division') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name_division" type="text" id="name_division" value="{{ old('name_division', optional($wildlifeConservation)->name_division) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('wildlife_conservations.name_division__placeholder') }}" step="any">
        {!! $errors->first('name_division', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name_ward') ? 'has-error' : '' }}">
    <label for="name_ward" class="col-md-2 control-label">{{ trans('wildlife_conservations.name_ward') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name_ward" type="text" id="name_ward" value="{{ old('name_ward', optional($wildlifeConservation)->name_ward) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('wildlife_conservations.name_ward__placeholder') }}" step="any">
        {!! $errors->first('name_ward', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('wildlife_id') ? 'has-error' : '' }}">
    <label for="wildlife_id" class="col-md-2 control-label">{{ trans('wildlife_conservations.wildlife_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="wildlife_id" name="wildlife_id">
        	    <option value="" style="display: none;" {{ old('wildlife_id', optional($wildlifeConservation)->wildlife_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('wildlife_conservations.wildlife_id__placeholder') }}</option>
        	@foreach ($Wildlifes as $key => $Wildlife)
			    <option value="{{ $key }}" {{ old('wildlife_id', optional($wildlifeConservation)->wildlife_id) == $key ? 'selected' : '' }}>
			    	{{ $Wildlife }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('wildlife_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('actual_wildlife') ? 'has-error' : '' }}">
    <label for="wildlife_conservation_type" class="col-md-2 control-label">{{ trans('wildlife_conservations.wildlife_conservation_type') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="wildlife_conservation_type" type="text" id="wildlife_conservation_type" value="{{ old('wildlife_conservation_type', optional($wildlifeConservation)->wildlife_conservation_type) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('wildlife_conservations.wildlife_conservation_type__placeholder') }}" step="any">
        {!! $errors->first('wildlife_conservation_type', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('actual_wildlife') ? 'has-error' : '' }}">
    <label for="wildlife_conservation_name" class="col-md-2 control-label">{{ trans('wildlife_conservations.wildlife_conservation_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="wildlife_conservation_name" type="text" id="wildlife_conservation_name" value="{{ old('wildlife_conservation_name', optional($wildlifeConservation)->wildlife_conservation_name) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('wildlife_conservations.wildlife_conservation_name__placeholder') }}" step="any">
        {!! $errors->first('wildlife_conservation_name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('actual_wildlife') ? 'has-error' : '' }}">
    <label for="specie_available_name" class="col-md-2 control-label">{{ trans('wildlife_conservations.specie_available_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="specie_available_name" type="text" id="specie_available_name" value="{{ old('specie_available_name', optional($wildlifeConservation)->specie_available_name) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('wildlife_conservations.specie_available_name__placeholder') }}" step="any">
        {!! $errors->first('specie_available_name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('actual_wildlife') ? 'has-error' : '' }}">
    <label for="total_number_species_available" class="col-md-2 control-label">{{ trans('wildlife_conservations.total_number_species_available') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="total_number_species_available" type="number" id="total_number_species_available" value="{{ old('total_number_species_available', optional($wildlifeConservation)->total_number_species_available) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('wildlife_conservations.total_number_species_available__placeholder') }}" step="any">
        {!! $errors->first('total_number_species_available', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>


