
<div class="form-group {{ $errors->has('land_use_plan_id') ? 'has-error' : '' }}">
    <label for="land_use_plan_id" class="col-md-2 control-label">{{ trans('diaryKeepers.land_use_plan_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="land_use_plan_id" name="land_use_plan_id" required="true">
                <option value="" style="display: none;" {{ old('land_use_plan_id', optional($diaryKeeper)->land_use_plan_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('diaryKeepers.land_use_plan_id__placeholder') }}</option>
            @foreach ($LandUsePlans as $key => $LandUsePlan)
                <option value="{{ $key }}" {{ old('land_use_plan_id', optional($diaryKeeper)->land_use_plan_id) == $key ? 'selected' : '' }}>
                    {{ $LandUsePlan }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('land_use_plan_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('livestock_id') ? 'has-error' : '' }}">
    <label for="livestock_id" class="col-md-2 control-label">{{ trans('diaryKeepers.livestock_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="livestock_id" name="livestock_id">
                <option value="" style="display: none;" {{ old('livestock_id', optional($diaryKeeper)->livestock_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('diaryKeepers.livestock_id__placeholder') }}</option>
            @foreach ($Livestocks as $key => $Livestock)
                <option value="{{ $key }}" {{ old('livestock_id', optional($diaryKeeper)->livestock_id) == $key ? 'selected' : '' }}>
                    {{ $Livestock }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('livestock_id', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('number_of_livestock') ? 'has-error' : '' }}">
    <label for="number_of_livestock" class="col-md-2 control-label">{{ trans('diaryKeepers.number_of_livestock') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="number_of_livestock" type="number" id="number_of_livestock" value="{{ old('number_of_livestock', optional($diaryKeeper)->number_of_livestock) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('diaryKeepers.number_of_livestock__placeholder') }}" step="any">
        {!! $errors->first('number_of_livestock', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('diary_farm_name') ? 'has-error' : '' }}">
    <label for="diary_farm_name" class="col-md-2 control-label">{{ trans('diaryKeepers.diary_farm_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="diary_farm_name" type="text" id="diary_farm_name" value="{{ old('diary_farm_name', optional($diaryKeeper)->diary_farm_name) }}" min="-999999" max="999999" required="true" placeholder="{{ trans('diaryKeepers.diary_farm_name__placeholder') }}" step="any">
        {!! $errors->first('diary_farm_name', '<p class="help-block"  style="color:red;">:message</p>') !!}
    </div>
</div>

