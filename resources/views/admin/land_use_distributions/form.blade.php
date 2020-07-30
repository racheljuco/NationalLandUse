
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('land_use_distributions.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id">
        	    <option value="" style="display: none;" {{ old('land_use_plan_id', optional($landUseDistribution)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('land_use_distributions.land_use_plan_id__placeholder') }}</option>
        	@foreach ($LandUsePlans as $key => $LandUsePlan)
			    <option value="{{ $key }}" {{ old('land_use_plan_id', optional($landUseDistribution)->land_use_plan_id) == $key ? 'selected' : '' }}>
			    	{{ $LandUsePlan }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('village_area') ? 'has-error' : '' }}">
    <label for="village_area" class="col-md-2 control-label">{{ trans('land_use_distributions.village_area') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="village_area" type="number" id="village_area" value="{{ old('village_area', optional($landUseDistribution)->village_area) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('land_use_distributions.village_area__placeholder') }}" step="any">
        {!! $errors->first('village_area', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('projected_households') ? 'has-error' : '' }}">
    <label for="projected_households" class="col-md-2 control-label">{{ trans('land_use_distributions.projected_households') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="projected_households" type="number" id="projected_households" value="{{ old('projected_households', optional($landUseDistribution)->projected_households) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('land_use_distributions.projected_households__placeholder') }}" step="any">
        {!! $errors->first('projected_households', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('year_preparation') ? 'has-error' : '' }}">
    <label for="year_preparation" class="col-md-2 control-label">{{ trans('land_use_distributions.year_preparation') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="year_preparation" type="number" min="1900" max="2099" step="1" id="year_preparation" value="{{ old('year_preparation', optional($landUseDistribution)->year_preparation) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('land_use_distributions.year_preparation__placeholder') }}">
        {!! $errors->first('year_preparation', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('settlement') ? 'has-error' : '' }}">
    <label for="settlement" class="col-md-2 control-label">{{ trans('land_use_distributions.settlement') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="settlement" type="number" id="settlement" value="{{ old('settlement', optional($landUseDistribution)->settlement) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('land_use_distributions.settlement__placeholder') }}" step="any">
        {!! $errors->first('settlement', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('social_service') ? 'has-error' : '' }}">
    <label for="social_service" class="col-md-2 control-label">{{ trans('land_use_distributions.social_service') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="social_service" type="number" id="social_service" value="{{ old('social_service', optional($landUseDistribution)->social_service) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('land_use_distributions.social_service__placeholder') }}" step="any">
        {!! $errors->first('social_service', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('agriculture') ? 'has-error' : '' }}">
    <label for="agriculture" class="col-md-2 control-label">{{ trans('land_use_distributions.agriculture') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="agriculture" type="number" id="agriculture" value="{{ old('agriculture', optional($landUseDistribution)->agriculture) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('land_use_distributions.agriculture__placeholder') }}" step="any">
        {!! $errors->first('agriculture', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('agriculture_settlement') ? 'has-error' : '' }}">
    <label for="agriculture_settlement" class="col-md-2 control-label">{{ trans('land_use_distributions.agriculture_settlement') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="agriculture_settlement" type="number" id="agriculture_settlement" value="{{ old('agriculture_settlement', optional($landUseDistribution)->agriculture_settlement) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('land_use_distributions.agriculture_settlement__placeholder') }}" step="any">
        {!! $errors->first('agriculture_settlement', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('grazing') ? 'has-error' : '' }}">
    <label for="grazing" class="col-md-2 control-label">{{ trans('land_use_distributions.grazing') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="grazing" type="number" id="grazing" value="{{ old('grazing', optional($landUseDistribution)->grazing) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('land_use_distributions.grazing__placeholder') }}" step="any">
        {!! $errors->first('grazing', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('utilization_forest') ? 'has-error' : '' }}">
    <label for="utilization_forest" class="col-md-2 control-label">{{ trans('land_use_distributions.utilization_forest') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="utilization_forest" type="number" id="utilization_forest" value="{{ old('utilization_forest', optional($landUseDistribution)->utilization_forest) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('land_use_distributions.utilization_forest__placeholder') }}" step="any">
        {!! $errors->first('utilization_forest', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('reserved_forest') ? 'has-error' : '' }}">
    <label for="reserved_forest" class="col-md-2 control-label">{{ trans('land_use_distributions.reserved_forest') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="reserved_forest" type="number" id="reserved_forest" value="{{ old('reserved_forest', optional($landUseDistribution)->reserved_forest) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('land_use_distributions.reserved_forest__placeholder') }}" step="any">
        {!! $errors->first('reserved_forest', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('other_reserved_land') ? 'has-error' : '' }}">
    <label for="other_reserved_land" class="col-md-2 control-label">{{ trans('land_use_distributions.other_reserved_land') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="other_reserved_land" type="number" id="other_reserved_land" value="{{ old('other_reserved_land', optional($landUseDistribution)->other_reserved_land) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('land_use_distributions.other_reserved_land__placeholder') }}" step="any">
        {!! $errors->first('other_reserved_land', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('water_sources') ? 'has-error' : '' }}">
    <label for="water_sources" class="col-md-2 control-label">{{ trans('land_use_distributions.water_sources') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="water_sources" type="number" id="water_sources" value="{{ old('water_sources', optional($landUseDistribution)->water_sources) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('land_use_distributions.water_sources__placeholder') }}" step="any">
        {!! $errors->first('water_sources', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('wma') ? 'has-error' : '' }}">
    <label for="wma" class="col-md-2 control-label">{{ trans('land_use_distributions.wma') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="wma" type="number" id="wma" value="{{ old('wma', optional($landUseDistribution)->wma) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('land_use_distributions.wma__placeholder') }}" step="any">
        {!! $errors->first('wma', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('land_bank') ? 'has-error' : '' }}">
    <label for="land_bank" class="col-md-2 control-label">{{ trans('land_use_distributions.land_bank') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="land_bank" type="number" id="land_bank" value="{{ old('land_bank', optional($landUseDistribution)->land_bank) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('land_use_distributions.land_bank__placeholder') }}" step="any">
        {!! $errors->first('land_bank', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('land_investment') ? 'has-error' : '' }}">
    <label for="land_investment" class="col-md-2 control-label">{{ trans('land_use_distributions.land_investment') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="land_investment" type="number" id="land_investment" value="{{ old('land_investment', optional($landUseDistribution)->land_investment) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('land_use_distributions.land_investment__placeholder') }}" step="any">
        {!! $errors->first('land_investment', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('quarrying') ? 'has-error' : '' }}">
    <label for="quarrying" class="col-md-2 control-label">{{ trans('land_use_distributions.quarrying') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="quarrying" type="number" id="quarrying" value="{{ old('quarrying', optional($landUseDistribution)->quarrying) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('land_use_distributions.quarrying__placeholder') }}" step="any">
        {!! $errors->first('quarrying', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

