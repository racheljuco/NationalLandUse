
<div class="form-group {{ $errors->has('type_mineral_id') ? 'has-error' : '' }}">
    <label for="type_mineral_id" class="col-md-2 control-label">{{ trans('minerals.type_mineral_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="type_mineral_id" name="type_mineral_id">
        	    <option value="" style="display: none;" {{ old('type_mineral_id', optional($mineral)->type_mineral_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('minerals.typemineral_id__placeholder') }}</option>
        	@foreach ($TypeMinerals as $key => $TypeMineral)
			    <option value="{{ $key }}" {{ old('typemineral_id', optional($mineral)->typemineral_id) == $key ? 'selected' : '' }}>
			    	{{ $TypeMineral }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('typemineral_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('minerals.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($mineral)->name) }}" minlength="1" maxlength="15" required="true" placeholder="{{ trans('minerals.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">{{ trans('minerals.description') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($mineral)->description) }}" maxlength="45">
        {!! $errors->first('description', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>




