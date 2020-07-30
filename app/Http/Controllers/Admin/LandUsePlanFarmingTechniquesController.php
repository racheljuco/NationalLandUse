<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandUsePlanFarmingTechniquesFormRequest;
use App\Models\FarmingTechnique;
use App\Models\LandUsePlan;
use App\Models\LandUsePlanFarmingTechnique;

class LandUsePlanFarmingTechniquesController extends Controller
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
     * Display a listing of the land use plan farming techniques.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $landUsePlanFarmingTechniques = LandUsePlanFarmingTechnique::with('landuseplan','farmingtechnique')->paginate(25);

        return view('admin.land_use_plan_farming_techniques.index', compact('landUsePlanFarmingTechniques'));
    }

    /**
     * Show the form for creating a new land use plan farming technique.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $FarmingTechniques = FarmingTechnique::pluck('name','id')->all();
        
        return view('admin.land_use_plan_farming_techniques.create', compact('LandUsePlans','FarmingTechniques'));
    }

    /**
     * Store a new land use plan farming technique in the storage.
     *
     * @param App\Http\Requests\LandUsePlanFarmingTechniquesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(LandUsePlanFarmingTechniquesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            LandUsePlanFarmingTechnique::create($data);

            return redirect()->route('admin.land_use_plan_farming_technique.index')
                             ->with('success_message', trans('land_use_plan_farming_techniques.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_farming_techniques.unexpected_error')]);
        }
    }

    /**
     * Display the specified land use plan farming technique.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $landUsePlanFarmingTechnique = LandUsePlanFarmingTechnique::with('landuseplan','farmingtechnique')->findOrFail($id);

        return view('admin.land_use_plan_farming_techniques.show', compact('landUsePlanFarmingTechnique'));
    }

    /**
     * Show the form for editing the specified land use plan farming technique.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $landUsePlanFarmingTechnique = LandUsePlanFarmingTechnique::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $FarmingTechniques = FarmingTechnique::pluck('name','id')->all();

        return view('admin.land_use_plan_farming_techniques.edit', compact('landUsePlanFarmingTechnique','LandUsePlans','FarmingTechniques'));
    }

    /**
     * Update the specified land use plan farming technique in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LandUsePlanFarmingTechniquesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, LandUsePlanFarmingTechniquesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $landUsePlanFarmingTechnique = LandUsePlanFarmingTechnique::findOrFail($id);
            $landUsePlanFarmingTechnique->update($data);

            return redirect()->route('admin.land_use_plan_farming_technique.index')
                             ->with('success_message', trans('land_use_plan_farming_techniques.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_farming_techniques.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified land use plan farming technique from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $landUsePlanFarmingTechnique = LandUsePlanFarmingTechnique::findOrFail($id);
            $landUsePlanFarmingTechnique->delete();

            return redirect()->route('admin.land_use_plan_farming_technique.index')
                             ->with('success_message', trans('land_use_plan_farming_techniques.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_farming_techniques.unexpected_error')]);
        }
    }



}