<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandUsePlanFarmingPracticesFormRequest;
use App\Models\FarmingPractice;
use App\Models\LandUsePlan;
use App\Models\LandUsePlanFarmingPractice;

class LandUsePlanFarmingPracticesController extends Controller
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
     * Display a listing of the land use plan farming practices.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $landUsePlanFarmingPractices = LandUsePlanFarmingPractice::with('landuseplan','farmingpractice')->paginate(25);

        return view('admin.land_use_plan_farming_practices.index', compact('landUsePlanFarmingPractices'));
    }

    /**
     * Show the form for creating a new land use plan farming practice.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();  
        $FarmingPractices = FarmingPractice::pluck('name','id')->all();
        
        return view('admin.land_use_plan_farming_practices.create', compact('LandUsePlans','FarmingPractices'));
    }

    /**
     * Store a new land use plan farming practice in the storage.
     *
     * @param App\Http\Requests\LandUsePlanFarmingPracticesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(LandUsePlanFarmingPracticesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            LandUsePlanFarmingPractice::create($data);

            return redirect()->route('admin.land_use_plan_farming_practice.index')
                             ->with('success_message', trans('land_use_plan_farming_practices.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_farming_practices.unexpected_error')]);
        }
    }

    /**
     * Display the specified land use plan farming practice.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $landUsePlanFarmingPractice = LandUsePlanFarmingPractice::with('landuseplan','farmingpractice')->findOrFail($id);

        return view('admin.land_use_plan_farming_practices.show', compact('landUsePlanFarmingPractice'));
    }

    /**
     * Show the form for editing the specified land use plan farming practice.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $landUsePlanFarmingPractice = LandUsePlanFarmingPractice::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $FarmingPractices = FarmingPractice::pluck('name','id')->all();

        return view('admin.land_use_plan_farming_practices.edit', compact('landUsePlanFarmingPractice','LandUsePlans','FarmingPractices'));
    }

    /**
     * Update the specified land use plan farming practice in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LandUsePlanFarmingPracticesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, LandUsePlanFarmingPracticesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $landUsePlanFarmingPractice = LandUsePlanFarmingPractice::findOrFail($id);
            $landUsePlanFarmingPractice->update($data);

            return redirect()->route('admin.land_use_plan_farming_practice.index')
                             ->with('success_message', trans('land_use_plan_farming_practices.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_farming_practices.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified land use plan farming practice from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $landUsePlanFarmingPractice = LandUsePlanFarmingPractice::findOrFail($id);
            $landUsePlanFarmingPractice->delete();

            return redirect()->route('admin.land_use_plan_farming_practice.index')
                             ->with('success_message', trans('land_use_plan_farming_practices.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_farming_practices.unexpected_error')]);
        }
    }



}