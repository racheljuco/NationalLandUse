
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('gazettes.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($gazette)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('gazettes.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($gazette)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('gn_number') ? 'has-error' : '' }}">
    <label for="gn_number" class="col-md-2 control-label">{{ trans('gazettes.gn_number') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="gn_number" type="text" id="gn_number" value="{{ old('gn_number', optional($gazette)->gn_number) }}" min="1" max="15" required="true" placeholder="{{ trans('gazettes.gn_number__placeholder') }}">
        {!! $errors->first('gn_number', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    <label for="title" class="col-md-2 control-label">{{ trans('gazettes.title') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="title" type="text" id="title" value="{{ old('title', optional($gazette)->title) }}" minlength="1" maxlength="45" required="true" placeholder="{{ trans('gazettes.title__placeholder') }}">
        {!! $errors->first('title', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('published_date') ? 'has-error' : '' }}">
    <label for="published_date" class="col-md-2 control-label">{{ trans('gazettes.published_date') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="published_date" type="text" id="published_date" value="{{ old('published_date', optional($gazette)->published_date) }}" placeholder="{{ trans('gazettes.published_date__placeholder') }}">
        {!! $errors->first('published_date', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('expired_date') ? 'has-error' : '' }}">
    <label for="expired_date" class="col-md-2 control-label">{{ trans('gazettes.expired_date') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="expired_date" type="text" id="expired_date" value="{{ old('expired_date', optional($gazette)->expired_date) }}" placeholder="{{ trans('gazettes.expired_date__placeholder') }}">
        {!! $errors->first('expired_date', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

