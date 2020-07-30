
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('wildlife_corridors.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($wildlifeCorridor)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('wildlife_corridors.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($wildlifeCorridor)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach    
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name_division') ? 'has-error' : '' }}">
    <label for="name_division" class="col-md-2 control-label">{{ trans('wildlife_corridors.name_division') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name_division" type="text" id="name_division" value="{{ old('name_division', optional($wildlifeCorridor)->name_division) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('wildlife_corridors.name_division__placeholder') }}" step="any">
        {!! $errors->first('name_division', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name_ward') ? 'has-error' : '' }}">
    <label for="name_ward" class="col-md-2 control-label">{{ trans('wildlife_corridors.name_ward') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name_ward" type="text" id="name_ward" value="{{ old('name_ward', optional($wildlifeCorridor)->name_ward) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('wildlife_corridors.name_ward__placeholder') }}" step="any">
        {!! $errors->first('name_ward', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('wildlife_id') ? 'has-error' : '' }}">
    <label for="wildlife_id" class="col-md-2 control-label">{{ trans('wildlife_corridors.wildlife_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="wildlife_id" name="wildlife_id">
        	    <option value="" style="display: none;" {{ old('wildlife_id', optional($wildlifeCorridor)->wildlife_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('wildlife_corridors.wildlife_id__placeholder') }}</option>
        	@foreach ($Wildlifes as $key => $Wildlife)
			    <option value="{{ $key }}" {{ old('wildlife_id', optional($wildlifeCorridor)->wildlife_id) == $key ? 'selected' : '' }}>
			    	{{ $Wildlife }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('wildlife_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('actual_wildlife') ? 'has-error' : '' }}">
    <label for="wildlife_corridor_name" class="col-md-2 control-label">{{ trans('wildlife_corridors.wildlife_corridor_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="wildlife_corridor_name" type="text" id="wildlife_corridor_name" value="{{ old('wildlife_corridor_name', optional($wildlifeCorridor)->wildlife_corridor_name) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('wildlife_corridors.wildlife_corridor_name__placeholder') }}" step="any">
        {!! $errors->first('wildlife_corridor_name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>


