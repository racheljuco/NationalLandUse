
<div class="form-group {{ $errors->has('region_name') ? 'has-error' : '' }}">
    <label for="region_name" class="col-md-2 control-label">{{ trans('regions.region_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="region_name" type="text" id="region_name" value="{{ old('region_name', optional($region)->region_name) }}" minlength="1" maxlength="45" required="true" placeholder="{{ trans('regions.region_name__placeholder') }}">
        {!! $errors->first('region_name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
    <label for="code" class="col-md-2 control-label">{{ trans('regions.code') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="code" type="text" id="code" value="{{ old('code', optional($region)->code) }}" minlength="1" maxlength="10" required="true" placeholder="{{ trans('regions.code__placeholder') }}">
        {!! $errors->first('code', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

