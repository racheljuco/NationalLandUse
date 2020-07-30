
<div class="form-group {{ $errors->has('type_livestock_id') ? 'has-error' : '' }}">
    <label for="type_livestock_id" class="col-md-2 control-label">{{ trans('livestocks.type_livestock_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="type_livestock_id" name="type_livestock_id">
        	    <option value="" style="display: none;" {{ old('type_livestock_id', optional($livestock)->type_livestock_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('livestocks.typelivestock_id__placeholder') }}</option>
        	@foreach ($TypeLivestocks as $key => $TypeLivestock)
			    <option value="{{ $key }}" {{ old('typelivestock_id', optional($livestock)->typelivestock_id) == $key ? 'selected' : '' }}>
			    	{{ $TypeLivestock }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('typelivestock_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('livestocks.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($livestock)->name) }}" minlength="1" maxlength="15" required="true" placeholder="{{ trans('livestocks.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">{{ trans('livestocks.description') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($livestock)->description) }}" maxlength="45">
        {!! $errors->first('description', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>




