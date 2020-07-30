
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('mineral_details.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($mineralDetail)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('mineral_details.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($mineralDetail)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('type_mineral_id') ? 'has-error' : '' }}">
    <label for="type_mineral_id" class="col-md-2 control-label">{{ trans('minerals.type_mineral_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="type_mineral_id" name="type_mineral_id">
                <option value="" style="display: none;" {{ old('type_mineral_id', optional($mineral)->type_mineral_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('minerals.typemineral_id__placeholder') }}</option>
            @foreach ($TypeMinerals as $key => $TypeMineral)
                <option value="{{ $key }}" {{ old('typemineral_id', optional($mineral)->typemineral_id) == $key ? 'selected' : '' }}>
                    {{ $TypeMineral }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('typemineral_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('mineral_id') ? 'has-error' : '' }}">
    <label for="mineral_id" class="col-md-2 control-label">{{ trans('mineral_details.mineral_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="mineral_id" name="mineral_id">
        	    <option value="" style="display: none;" {{ old('mineral_id', optional($mineralDetail)->mineral_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('mineral_details.mineral_id__placeholder') }}</option>
        	@foreach ($Minerals as $key => $Mineral)
			    <option value="{{ $key }}" {{ old('mineral_id', optional($mineralDetail)->mineral_id) == $key ? 'selected' : '' }}>
			    	{{ $Mineral }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('mineral_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('mining_type') ? 'has-error' : '' }}">
    <label for="mineraling_place" class="col-md-2 control-label">{{ trans('mineral_details.mining_type') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="mining_type" type="text" id="mining_type" value="{{ old('mining_type', optional($mineralDetail)->mining_type) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('fish_details.mining_type__placeholder') }}" step="any">
        {!! $errors->first('mining_type', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('mineral_exploitation_modality') ? 'has-error' : '' }}">
    <label for="mineral_exploitation_modality" class="col-md-2 control-label">{{ trans('mineral_details.mineral_exploitation_modality') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="mineral_exploitation_modality" type="number" id="mineral_exploitation_modality" value="{{ old('mineral_exploitation_modality', optional($fishDetail)->mineral_exploitation_modality) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('mineral_details.mineral_exploitation_modality__placeholder') }}" step="any">
        {!! $errors->first('mineral_exploitation_modality', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('total_are_for_mining') ? 'has-error' : '' }}">
    <label for="total_are_for_mining" class="col-md-2 control-label">{{ trans('mineral_details.total_are_for_mining') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="total_are_for_mining" type="number" id="total_are_for_mining" value="{{ old('total_are_for_mining', optional($mineralDetail)->total_are_for_mining) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('mineral_details.total_are_for_mining__placeholder') }}" step="any">
        {!! $errors->first('total_are_for_mining', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('market_name') ? 'has-error' : '' }}">
    <label for="mineraling_place" class="col-md-2 control-label">{{ trans('mineral_details.market_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="market_name" type="text" id="market_name" value="{{ old('market_name', optional($mineralDetail)->market_name) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('fish_details.market_name__placeholder') }}" step="any">
        {!! $errors->first('market_name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('year') ? 'has-error' : '' }}">
    <label for="year" class="col-md-2 control-label">{{ trans('mineral_details.year') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="year" type="number" id="year" value="{{ old('year', optional($mineralDetail)->year) }}" min="1900" max="2099" required="true" placeholder="{{ trans('fish_details.year__placeholder') }}" step="any">
        {!! $errors->first('year', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>
