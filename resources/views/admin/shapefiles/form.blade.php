
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('shape_files.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($shapeFile)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('shape_files.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($shapeFile)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('shape_files.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($shapeFile)->name) }}" minlength="1" maxlength="30" required="true" placeholder="{{ trans('shape_files.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('filepath') ? 'has-error' : '' }}">
    <label for="filepath" class="col-md-2 control-label">{{ trans('shape_files.filepath') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="filepath" type="file" id="filepath" value="{{ old('filepath', optional($shapeFile)->filepath) }}" required="true" placeholder="{{ trans('shape_files.filepath__placeholder') }}">
        {!! $errors->first('filepath', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

