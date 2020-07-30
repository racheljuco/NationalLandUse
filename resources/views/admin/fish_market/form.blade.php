
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('fish_markets.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($fishMarket)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('fish_markets.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($fishMarket)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('fish_id') ? 'has-error' : '' }}">
    <label for="fish_id" class="col-md-2 control-label">{{ trans('fish_markets.fish_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="fish_id" name="fish_id">
        	    <option value="" style="display: none;" {{ old('fish_id', optional($fishMarket)->fish_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('fish_markets.fish_id__placeholder') }}</option>
        	@foreach ($fishs as $key => $Fish)
			    <option value="{{ $key }}" {{ old('fish_id', optional($fishMarket)->fish_id) == $key ? 'selected' : '' }}>
			    	{{ $Fish }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('fish_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('actual_fish') ? 'has-error' : '' }}">
    <label for="fish_market_name" class="col-md-2 control-label">{{ trans('fish_markets.fish_market_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="fish_market_name" type="text" id="fish_market_name" value="{{ old('fish_market_name', optional($fishMarket)->fish_market_name) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('fish_markets.fish_market_name__placeholder') }}" step="any">
        {!! $errors->first('fish_market_name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>


