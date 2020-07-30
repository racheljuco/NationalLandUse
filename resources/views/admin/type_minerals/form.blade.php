
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('mineral_types.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($mineralType)->name) }}" minlength="1" maxlength="30" required="true" placeholder="{{ trans('mineral_types.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">{{ trans('mineral_types.description') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($mineralType)->description) }}" maxlength="45">
        {!! $errors->first('description', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

