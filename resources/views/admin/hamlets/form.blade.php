
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('hamlets.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($hamlet)->name) }}" minlength="1" maxlength="30" required="true" placeholder="{{ trans('hamlets.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">{{ trans('hamlets.description') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($hamlet)->description) }}" maxlength="60">
        {!! $errors->first('description', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('village_id') ? 'has-error' : '' }}">
    <label for="village_id" class="col-md-2 control-label">{{ trans('hamlets.village_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="village_id" name="village_id">
        	    <option value="" style="display: none;" {{ old('village_id', optional($hamlet)->village_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('hamlets.village_id__placeholder') }}</option>
        	@foreach ($Villages as $key => $Village)
			    <option value="{{ $key }}" {{ old('village_id', optional($hamlet)->village_id) == $key ? 'selected' : '' }}>
			    	{{ $Village }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('village_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

