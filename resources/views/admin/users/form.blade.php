
<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
    <label for="first_name" class="col-md-2 control-label">First Name</label>
    <div class="col-md-10">
        <input class="form-control" name="first_name" type="text" id="first_name" value="{{ old('first_name', optional($user)->first_name) }}" minlength="1" maxlength="255" required="true" placeholder="First Name">
        {!! $errors->first('first_name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('middle_name') ? 'has-error' : '' }}">
    <label for="middle_name" class="col-md-2 control-label">Middle Name</label>
    <div class="col-md-10">
        <input class="form-control" name="middle_name" type="text" id="middle_name" value="{{ old('middle_name', optional($user)->middle_name) }}" minlength="1" maxlength="255" placeholder="Middle Name">
        {!! $errors->first('middle_name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
    <label for="last_name" class="col-md-2 control-label">Last Name</label>
    <div class="col-md-10">
        <input class="form-control" name="last_name" type="text" id="last_name" value="{{ old('last_name', optional($user)->last_name) }}" minlength="1" maxlength="255" required="true" placeholder="Last Name">
        {!! $errors->first('last_name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">User Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($user)->name) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">{{ trans('users.email') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($user)->email) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.email__placeholder') }}">
        {!! $errors->first('email', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
    <label for="phone_number" class="col-md-2 control-label">Phone Number</label>
    <div class="col-md-10">
        <input class="form-control" name="phone_number" type="text" id="phone_number" value="{{ old('phone_number', optional($user)->phone_number) }}" minlength="1" maxlength="255" required="true" placeholder="Phone Number">
        {!! $errors->first('phone_number', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('designation') ? 'has-error' : '' }}">
    <label for="designation" class="col-md-2 control-label">Designation</label>
    <div class="col-md-10">
        <input class="form-control" name="designation" type="text" id="designation" value="{{ old('designation', optional($user)->designation) }}" minlength="1" maxlength="255" required="true" placeholder="Designation">
        {!! $errors->first('designation', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('proffession') ? 'has-error' : '' }}">
    <label for="proffession" class="col-md-2 control-label">Profession</label>
    <div class="col-md-10">
        <input class="form-control" name="proffession" type="text" id="proffession" value="{{ old('proffession', optional($user)->proffession) }}" minlength="1" maxlength="255" required="true" placeholder="Profession">
        {!! $errors->first('proffession', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('organisation_id') ? 'has-error' : '' }}">
    <label for="organisation_id" class="col-md-2 control-label">Organisation</label>
    <div class="col-md-10">
        <select class="form-control" id="organisation_id" name="organisation_id">
        	    <option value="" style="display: none;" {{ old('organisation_id', optional($user)->organisation_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select Organisation</option>
        	@foreach ($organisations as $key => $organisation)
			    <option value="{{ $key }}" {{ old('organisation_id', optional($user)->organisation_id) == $key ? 'selected' : '' }}>
			    	{{ $organisation}}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('organisation_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password" class="col-md-2 control-label">{{ trans('users.password') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="password" type="password" id="password" value="{{ old('password', optional($user)->password) }}" minlength="1" maxlength="255" required="{{$password_required}}" placeholder="{{ trans('users.password__placeholder') }}">
        {!! $errors->first('password', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<!-- Roles Form Input -->

<div class="form-group {{ $errors->has('label') ? 'has-error' : '' }} ml-1 mr-1">
        <label for="label" class="col-md-2 control-label">{{ trans('users.roles') }}</label>
        <div class="col-md-10">
            @foreach ($roles as $role)
        
            <input {{ isset($user)? $user->hasRole($role->name)? 'checked': '' :""}} name="roles[]" type="checkbox" value="{{$role->id}}">
            <label for="{{$role->name}}">{{ucfirst($role->name)}}</label><br>
              
            @endforeach
        </div>
    </div>
