<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandUsePlanFarmInputsFormRequest;
use App\Models\FarmInput;
use App\Models\LandUsePlan;
use App\Models\LandUsePlanFarmInput;

class LandUsePlanFarmInputsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	public function __construct()
	{
	    $this->middleware('auth');
	}
	
    /**
     * Display a listing of the land use plan farm inputs.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $landUsePlanFarmInputs = LandUsePlanFarmInput::with('landuseplan','farminput')->paginate(25);

        return view('admin.land_use_plan_farm_inputs.index', compact('landUsePlanFarmInputs'));
    }

    /**
     * Show the form for creating a new land use plan farm input.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
$FarmInputs = FarmInput::pluck('name','id')->all();
        
        return view('admin.land_use_plan_farm_inputs.create', compact('LandUsePlans','FarmInputs'));
    }

    /**
     * Store a new land use plan farm input in the storage.
     *
     * @param App\Http\Requests\LandUsePlanFarmInputsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(LandUsePlanFarmInputsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            LandUsePlanFarmInput::create($data);

            return redirect()->route('admin.land_use_plan_farm_input.index')
                             ->with('success_message', trans('land_use_plan_farm_inputs.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_farm_inputs.unexpected_error')]);
        }
    }

    /**
     * Display the specified land use plan farm input.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $landUsePlanFarmInput = LandUsePlanFarmInput::with('landuseplan','farminput')->findOrFail($id);

        return view('admin.land_use_plan_farm_inputs.show', compact('landUsePlanFarmInput'));
    }

    /**
     * Show the form for editing the specified land use plan farm input.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $landUsePlanFarmInput = LandUsePlanFarmInput::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
$FarmInputs = FarmInput::pluck('name','id')->all();

        return view('admin.land_use_plan_farm_inputs.edit', compact('landUsePlanFarmInput','LandUsePlans','FarmInputs'));
    }

    /**
     * Update the specified land use plan farm input in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LandUsePlanFarmInputsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, LandUsePlanFarmInputsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $landUsePlanFarmInput = LandUsePlanFarmInput::findOrFail($id);
            $landUsePlanFarmInput->update($data);

            return redirect()->route('admin.land_use_plan_farm_input.index')
                             ->with('success_message', trans('land_use_plan_farm_inputs.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_farm_inputs.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified land use plan farm input from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $landUsePlanFarmInput = LandUsePlanFarmInput::findOrFail($id);
            $landUsePlanFarmInput->delete();

            return redirect()->route('admin.land_use_plan_farm_input.index')
                             ->with('success_message', trans('land_use_plan_farm_inputs.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_farm_inputs.unexpected_error')]);
        }
    }



}