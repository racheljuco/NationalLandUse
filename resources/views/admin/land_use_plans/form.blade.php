
<div class="form-group {{ $errors->has('village_id') ? 'has-error' : '' }}">
    <label for="village_id" class="col-md-2 control-label">{{ trans('land_use_plans.village_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="village_id" name="village_id">
        	    <option value="" style="display: none;" {{ old('village_id', optional($landUsePlan)->village_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('land_use_plans.village_id__placeholder') }}</option>
        	@foreach ($Villages as $key => $Village)
			    <option value="{{ $key }}" {{ old('village_id', optional($landUsePlan)->village_id) == $key ? 'selected' : '' }}>
			    	{{ $Village }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('village_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('land_use_plan_status_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_status_id" class="col-md-2 control-label">{{ trans('land_use_plans.land_use_plan_status_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_status_id" name="land_use_plan_status_id">
        	    <option value="" style="display: none;" {{ old('land_use_plan_status_id', optional($landUsePlan)->land_use_plan_status_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('land_use_plans.land_use_plan_status_id__placeholder') }}</option>
        	@foreach ($LandUsePlanStatuses as $key => $LandUsePlanStatus)
			    <option value="{{ $key }}" {{ old('land_use_plan_status_id', optional($landUsePlan)->land_use_plan_status_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlanStatus }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_status_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('land_use_plans.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($landUsePlan)->name) }}" minlength="1" maxlength="45" required="true" placeholder="{{ trans('land_use_plans.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">{{ trans('land_use_plans.description') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($landUsePlan)->description) }}" maxlength="255">
        {!! $errors->first('description', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('created_date') ? 'has-error' : '' }}">
    <label for="created_date" class="col-md-2 control-label">{{ trans('land_use_plans.created_date') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="created_date" type="date" id="created_date" value="{{ old('created_date', optional($landUsePlan)->created_date) }}" required="true" placeholder="{{ trans('land_use_plans.created_date__placeholder') }}">
        {!! $errors->first('created_date', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">{{ trans('land_use_plans.status') }}</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="status_1">
            	<input id="status_1" class="" name="status" type="checkbox" value="1" {{ old('status', optional($landUsePlan)->status) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('status', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
    <label for="file" class="col-md-2 control-label">{{ trans('land_use_plans.file') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="file" type="file" id="file" value="{{ old('file', optional($landUsePlan)->file) }}">
        {!! $errors->first('file', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

