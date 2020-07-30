
<div class="form-group {{ $errors->has('district_id') ? 'has-error' : '' }}">
    <label for="district_id" class="col-md-2 control-label">{{ trans('villages.district_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="district_id" name="district_id">
        	    <option value="" style="display: none;" {{ old('district_id', optional($village)->district_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('villages.district_id__placeholder') }}</option>
        	@foreach ($Districts as $key => $District)
			    <option value="{{ $key }}" {{ old('district_id', optional($village)->district_id) == $key ? 'selected' : '' }}>
			    	{{ $District }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('district_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('village_name') ? 'has-error' : '' }}">
    <label for="village_name" class="col-md-2 control-label">{{ trans('villages.village_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="village_name" type="text" id="village_name" value="{{ old('village_name', optional($village)->village_name) }}" min="1" max="45" required="true" placeholder="{{ trans('villages.village_name__placeholder') }}">
        {!! $errors->first('village_name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

