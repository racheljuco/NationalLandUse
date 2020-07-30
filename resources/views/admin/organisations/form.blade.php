
<div class="form-group {{ $errors->has('organisation_type_id') ? 'has-error' : '' }}">
    <label for="organisation_type_id" class="col-md-2 control-label">{{ trans('organisations.organisation_type_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="organisation_type_id" name="organisation_type_id">
        	    <option value="" style="display: none;" {{ old('organisation_type_id', optional($organisation)->organisation_type_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('organisations.organisation_type_id__placeholder') }}</option>
        	@foreach ($OrganisationTypes as $key => $OrganisationType)
			    <option value="{{ $key }}" {{ old('organisation_type_id', optional($organisation)->organisation_type_id) == $key ? 'selected' : '' }}>
			    	{{ $OrganisationType }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('organisation_type_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('organisations.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($organisation)->name) }}" minlength="1" maxlength="45" required="true" placeholder="{{ trans('organisations.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    <label for="address" class="col-md-2 control-label">{{ trans('organisations.address') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="address" type="text" id="address" value="{{ old('address', optional($organisation)->address) }}" maxlength="255" placeholder="{{ trans('organisations.address__placeholder') }}">
        {!! $errors->first('address', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
    <label for="phone_number" class="col-md-2 control-label">{{ trans('organisations.phone_number') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="phone_number" type="text" id="phone_number" value="{{ old('phone_number', optional($organisation)->phone_number) }}" min="0" max="15" placeholder="{{ trans('organisations.phone_number__placeholder') }}">
        {!! $errors->first('phone_number', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">{{ trans('organisations.email') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($organisation)->email) }}" maxlength="45" placeholder="{{ trans('organisations.email__placeholder') }}">
        {!! $errors->first('email', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">{{ trans('organisations.description') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($organisation)->description) }}" maxlength="255">
        {!! $errors->first('description', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

