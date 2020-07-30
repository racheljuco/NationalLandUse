
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('livestock_products.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($livestockProduct)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('livestock_products.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($livestockProduct)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('livestock_id') ? 'has-error' : '' }}">
    <label for="livestock_id" class="col-md-2 control-label">{{ trans('livestock_products.livestock_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="livestock_id" name="livestock_id">
        	    <option value="" style="display: none;" {{ old('livestock_id', optional($livestockProduct)->livestock_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('livestock_products.livestock_id__placeholder') }}</option>
        	@foreach ($Livestocks as $key => $Livestock)
			    <option value="{{ $key }}" {{ old('livestock_id', optional($livestockProduct)->livestock_id) == $key ? 'selected' : '' }}>
			    	{{ $Livestock }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('livestock_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('slaughted') ? 'has-error' : '' }}">
    <label for="slaughted" class="col-md-2 control-label">{{ trans('livestock_products.slaughted') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="slaughted" type="number" id="slaughted" value="{{ old('slaughted', optional($livestockProduct)->slaughted) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('livestock_products.slaughted__placeholder') }}" step="any">
        {!! $errors->first('slaughted', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('eggs') ? 'has-error' : '' }}">
    <label for="eggs" class="col-md-2 control-label">{{ trans('livestock_products.eggs') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="eggs" type="number" id="eggs" value="{{ old('eggs', optional($livestockProduct)->eggs) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('livestock_products.eggs__placeholder') }}" step="any">
        {!! $errors->first('eggs', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('milk') ? 'has-error' : '' }}">
    <label for="milk" class="col-md-2 control-label">{{ trans('livestock_products.milk') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="milk" type="number" id="milk" value="{{ old('milk', optional($livestockProduct)->milk) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('livestock_products.milk__placeholder') }}" step="any">
        {!! $errors->first('milk', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

