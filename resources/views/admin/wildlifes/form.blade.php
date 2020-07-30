
<div class="form-group {{ $errors->has('type_wildlife_id') ? 'has-error' : '' }}">
    <label for="type_wildlife_id" class="col-md-2 control-label">{{ trans('wildlifes.type_wildlife_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="type_wildlife_id" name="type_wildlife_id">
        	    <option value="" style="display: none;" {{ old('type_wildlife_id', optional($wildlife)->type_wildlife_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('wildlifes.typewildlife_id__placeholder') }}</option>
        	@foreach ($TypeWildlifes as $key => $TypeWildlife)
			    <option value="{{ $key }}" {{ old('typewildlife_id', optional($wildlife)->typewildlife_id) == $key ? 'selected' : '' }}>
			    	{{ $TypeWildlife }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('typewildlife_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('wildlifes.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($wildlife)->name) }}" minlength="1" maxlength="15" required="true" placeholder="{{ trans('wildlifes.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">{{ trans('wildlifes.description') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($wildlife)->description) }}" maxlength="45">
        {!! $errors->first('description', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>




