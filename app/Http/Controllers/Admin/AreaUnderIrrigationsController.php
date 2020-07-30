<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AreaUnderIrrigationsFormRequest;
use App\Models\AreaUnderIrrigation;
use App\Models\LandUsePlan;
use App\Models\Village;

class AreaUnderIrrigationsController extends Controller
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
     * Display a listing of the area under irrigations.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $areaUnderIrrigations = AreaUnderIrrigation::with('landuseplan','village')->paginate(25);

        return view('admin.area_under_irrigations.index', compact('areaUnderIrrigations'));
    }

    /**
     * Show the form for creating a new area under irrigation.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Villages = Village::pluck('village_name','id')->all();
        
        return view('admin.area_under_irrigations.create', compact('LandUsePlans','Villages'));
    }

    /**
     * Store a new area under irrigation in the storage.
     *
     * @param App\Http\Requests\AreaUnderIrrigationsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(AreaUnderIrrigationsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            
            
            AreaUnderIrrigation::create($data);

            return redirect()->route('admin.area_under_irrigation.index')
                             ->with('success_message', trans('area_under_irrigations.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('area_under_irrigations.unexpected_error')]);
        }
    }

    /**
     * Display the specified area under irrigation.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $areaUnderIrrigation = AreaUnderIrrigation::with('landuseplan','village')->findOrFail($id);

        return view('admin.area_under_irrigations.show', compact('areaUnderIrrigation'));
    }

    /**
     * Show the form for editing the specified area under irrigation.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $areaUnderIrrigation = AreaUnderIrrigation::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Villages = Village::pluck('village_name','id')->all();

        return view('admin.area_under_irrigations.edit', compact('areaUnderIrrigation','LandUsePlans','Villages'));
    }

    /**
     * Update the specified area under irrigation in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\AreaUnderIrrigationsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, AreaUnderIrrigationsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            
            $areaUnderIrrigation = AreaUnderIrrigation::findOrFail($id);
            $areaUnderIrrigation->update($data);

            return redirect()->route('admin.area_under_irrigation.index')
                             ->with('success_message', trans('area_under_irrigations.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('area_under_irrigations.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified area under irrigation from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $areaUnderIrrigation = AreaUnderIrrigation::findOrFail($id);
            $areaUnderIrrigation->delete();

            return redirect()->route('admin.area_under_irrigation.index')
                             ->with('success_message', trans('area_under_irrigations.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('area_under_irrigations.unexpected_error')]);
        }
    }



}