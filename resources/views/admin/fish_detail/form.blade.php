
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('fish_details.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($fishDetail)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('fish_details.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($fishDetail)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

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


<div class="form-group {{ $errors->has('fish_id') ? 'has-error' : '' }}">
    <label for="fish_id" class="col-md-2 control-label">{{ trans('fish_details.fish_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="fish_id" name="fish_id">
        	    <option value="" style="display: none;" {{ old('fish_id', optional($fishDetail)->fish_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('fish_details.fish_id__placeholder') }}</option>
        	@foreach ($Fishs as $key => $Fish)
			    <option value="{{ $key }}" {{ old('fish_id', optional($fishDetail)->fish_id) == $key ? 'selected' : '' }}>
			    	{{ $Fish }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('fish_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('fishing_place') ? 'has-error' : '' }}">
    <label for="fishing_place" class="col-md-2 control-label">{{ trans('fish_details.fishing_place') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="fishing_place" type="text" id="fishing_place" value="{{ old('fishing_place', optional($fishDetail)->fishing_place) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('fish_details.fishing_place__placeholder') }}" step="any">
        {!! $errors->first('fishing_place', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('fisher_number') ? 'has-error' : '' }}">
    <label for="fisher_number" class="col-md-2 control-label">{{ trans('fish_details.fisher_number') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="fisher_number" type="number" id="fisher_number" value="{{ old('fisher_number', optional($fishDetail)->fisher_number) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('fish_details.fisher_number__placeholder') }}" step="any">
        {!! $errors->first('fisher_number', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('fish_amount') ? 'has-error' : '' }}">
    <label for="fish_amount" class="col-md-2 control-label">{{ trans('fish_details.fish_amount') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="fish_amount" type="number" id="fish_amount" value="{{ old('fish_amount', optional($fishDetail)->fish_amount) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('fish_details.fish_amount__placeholder') }}" step="any">
        {!! $errors->first('fish_amount', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('year') ? 'has-error' : '' }}">
    <label for="year" class="col-md-2 control-label">{{ trans('fish_details.year') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="year" type="number" id="year" value="{{ old('year', optional($fishDetail)->year) }}" min="1900" max="2099" required="true" placeholder="{{ trans('fish_details.year__placeholder') }}" step="any">
        {!! $errors->first('year', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>
