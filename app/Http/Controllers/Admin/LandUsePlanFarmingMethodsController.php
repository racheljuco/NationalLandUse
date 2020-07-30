<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandUsePlanFarmingMethodsFormRequest;
use App\Models\FarmingMethod;
use App\Models\LandUsePlan;
use App\Models\LandUsePlanFarmingMethod;

class LandUsePlanFarmingMethodsController extends Controller
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
     * Display a listing of the land use plan farming methods.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $landUsePlanFarmingMethods = LandUsePlanFarmingMethod::with('landuseplan','farmingmethod')->paginate(25);

        return view('admin.land_use_plan_farming_methods.index', compact('landUsePlanFarmingMethods'));
    }

    /**
     * Show the form for creating a new land use plan farming method.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
$FarmingMethods = FarmingMethod::pluck('name','id')->all();
        
        return view('admin.land_use_plan_farming_methods.create', compact('LandUsePlans','FarmingMethods'));
    }

    /**
     * Store a new land use plan farming method in the storage.
     *
     * @param App\Http\Requests\LandUsePlanFarmingMethodsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(LandUsePlanFarmingMethodsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            LandUsePlanFarmingMethod::create($data);

            return redirect()->route('admin.land_use_plan_farming_method.index')
                             ->with('success_message', trans('land_use_plan_farming_methods.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_farming_methods.unexpected_error')]);
        }
    }

    /**
     * Display the specified land use plan farming method.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $landUsePlanFarmingMethod = LandUsePlanFarmingMethod::with('landuseplan','farmingmethod')->findOrFail($id);

        return view('admin.land_use_plan_farming_methods.show', compact('landUsePlanFarmingMethod'));
    }

    /**
     * Show the form for editing the specified land use plan farming method.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $landUsePlanFarmingMethod = LandUsePlanFarmingMethod::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
$FarmingMethods = FarmingMethod::pluck('name','id')->all();

        return view('admin.land_use_plan_farming_methods.edit', compact('landUsePlanFarmingMethod','LandUsePlans','FarmingMethods'));
    }

    /**
     * Update the specified land use plan farming method in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LandUsePlanFarmingMethodsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, LandUsePlanFarmingMethodsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $landUsePlanFarmingMethod = LandUsePlanFarmingMethod::findOrFail($id);
            $landUsePlanFarmingMethod->update($data);

            return redirect()->route('admin.land_use_plan_farming_method.index')
                             ->with('success_message', trans('land_use_plan_farming_methods.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_farming_methods.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified land use plan farming method from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $landUsePlanFarmingMethod = LandUsePlanFarmingMethod::findOrFail($id);
            $landUsePlanFarmingMethod->delete();

            return redirect()->route('admin.land_use_plan_farming_method.index')
                             ->with('success_message', trans('land_use_plan_farming_methods.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_farming_methods.unexpected_error')]);
        }
    }



}