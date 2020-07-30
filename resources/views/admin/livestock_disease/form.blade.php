
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('livestock_diseases.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($livestockDisease)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('livestock_diseases.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($livestockDisease)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach    
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name_division') ? 'has-error' : '' }}">
    <label for="name_division" class="col-md-2 control-label">{{ trans('livestock_diseases.name_division') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name_division" type="text" id="name_division" value="{{ old('name_division', optional($livestockDisease)->name_division) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('livestock_diseases.name_division__placeholder') }}" step="any">
        {!! $errors->first('name_division', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name_ward') ? 'has-error' : '' }}">
    <label for="name_ward" class="col-md-2 control-label">{{ trans('livestock_diseases.name_ward') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name_ward" type="text" id="name_ward" value="{{ old('name_ward', optional($livestockDisease)->name_ward) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('livestock_diseases.name_ward__placeholder') }}" step="any">
        {!! $errors->first('name_ward', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('livestock_id') ? 'has-error' : '' }}">
    <label for="livestock_id" class="col-md-2 control-label">{{ trans('livestock_diseases.livestock_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="livestock_id" name="livestock_id">
        	    <option value="" style="display: none;" {{ old('livestock_id', optional($livestockDisease)->livestock_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('livestock_diseases.livestock_id__placeholder') }}</option>
        	@foreach ($Livestocks as $key => $Livestock)
			    <option value="{{ $key }}" {{ old('livestock_id', optional($livestockDisease)->livestock_id) == $key ? 'selected' : '' }}>
			    	{{ $Livestock }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('livestock_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('actual_livestock') ? 'has-error' : '' }}">
    <label for="livestock_disease_name" class="col-md-2 control-label">{{ trans('livestock_diseases.livestock_disease_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="livestock_disease_name" type="text" id="livestock_disease_name" value="{{ old('livestock_disease_name', optional($livestockDisease)->livestock_disease_name) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('livestock_diseases.livestock_disease_name__placeholder') }}" step="any">
        {!! $errors->first('livestock_disease_name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>


