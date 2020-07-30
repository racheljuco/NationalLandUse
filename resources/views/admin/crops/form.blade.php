
<div class="form-group {{ $errors->has('type_crop_id') ? 'has-error' : '' }}">
    <label for="type_crop_id" class="col-md-2 control-label">{{ trans('crops.type_crop_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="type_crop_id" name="type_crop_id">
        	    <option value="" style="display: none;" {{ old('type_crop_id', optional($crop)->type_crop_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('crops.type_crop_id__placeholder') }}</option>
        	@foreach ($TypeCrops as $key => $TypeCrop)
			    <option value="{{ $key }}" {{ old('type_crop_id', optional($crop)->type_crop_id) == $key ? 'selected' : '' }}>
			    	{{ $TypeCrop }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('type_crop_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('crops.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($crop)->name) }}" minlength="1" maxlength="15" required="true" placeholder="{{ trans('crops.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">{{ trans('crops.description') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($crop)->description) }}" maxlength="45">
        {!! $errors->first('description', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

