
<div class="form-group {{ $errors->has('type_fish_id') ? 'has-error' : '' }}">
    <label for="type_fish_id" class="col-md-2 control-label">{{ trans('fishs.type_fish_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="type_fish_id" name="type_fish_id">
        	    <option value="" style="display: none;" {{ old('type_fish_id', optional($fish)->type_fish_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('fishs.typefish_id__placeholder') }}</option>
        	@foreach ($TypeFishs as $key => $TypeFish)
			    <option value="{{ $key }}" {{ old('typefish_id', optional($fish)->typefish_id) == $key ? 'selected' : '' }}>
			    	{{ $TypeFish }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('typefish_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('fishs.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($fish)->name) }}" minlength="1" maxlength="15" required="true" placeholder="{{ trans('fishs.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">{{ trans('fishs.description') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($fish)->description) }}" maxlength="45">
        {!! $errors->first('description', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>




