
<div class="form-group {{ $errors->has('region_id') ? 'has-error' : '' }}">
    <label for="region_id" class="col-md-2 control-label">{{ trans('districts.region_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="region_id" name="region_id">
        	    <option value="" style="display: none;" {{ old('region_id', optional($district)->region_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('districts.region_id__placeholder') }}</option>
        	@foreach ($Regions as $key => $Region)
			    <option value="{{ $key }}" {{ old('region_id', optional($district)->region_id) == $key ? 'selected' : '' }}>
			    	{{ $Region }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('region_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('district_name') ? 'has-error' : '' }}">
    <label for="district_name" class="col-md-2 control-label">{{ trans('districts.district_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="district_name" type="text" id="district_name" value="{{ old('district_name', optional($district)->district_name) }}" minlength="1" maxlength="45" required="true" placeholder="{{ trans('districts.district_name__placeholder') }}">
        {!! $errors->first('district_name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
    <label for="code" class="col-md-2 control-label">{{ trans('districts.code') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="code" type="text" id="code" value="{{ old('code', optional($district)->code) }}" maxlength="10" placeholder="{{ trans('districts.code__placeholder') }}">
        {!! $errors->first('code', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

