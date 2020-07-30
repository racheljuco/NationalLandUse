<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\IrrigatedPotentialAreasFormRequest;
use App\Models\IrrigatedPotentialArea;
use App\Models\LandUsePlan;
use App\Models\Village;

class IrrigatedPotentialAreasController extends Controller
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
     * Display a listing of the irrigated potential areas.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $irrigatedPotentialAreas = IrrigatedPotentialArea::with('landuseplan','village')->paginate(25);

        return view('admin.irrigated_potential_areas.index', compact('irrigatedPotentialAreas'));
    }

    /**
     * Show the form for creating a new irrigated potential area.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Villages = Village::pluck('village_name','id')->all();
        
        return view('admin.irrigated_potential_areas.create', compact('LandUsePlans','Villages'));
    }

    /**
     * Store a new irrigated potential area in the storage.
     *
     * @param App\Http\Requests\IrrigatedPotentialAreasFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(IrrigatedPotentialAreasFormRequest $request)
    {
        try {
            
            $data = $request->getData();

            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            
            IrrigatedPotentialArea::create($data);

            return redirect()->route('admin.irrigated_potential_area.index')
                             ->with('success_message', trans('irrigated_potential_areas.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('irrigated_potential_areas.unexpected_error')]);
        }
    }

    /**
     * Display the specified irrigated potential area.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $irrigatedPotentialArea = IrrigatedPotentialArea::with('landuseplan','village')->findOrFail($id);

        return view('admin.irrigated_potential_areas.show', compact('irrigatedPotentialArea'));
    }

    /**
     * Show the form for editing the specified irrigated potential area.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $irrigatedPotentialArea = IrrigatedPotentialArea::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Villages = Village::pluck('village_name','id')->all();

        return view('admin.irrigated_potential_areas.edit', compact('irrigatedPotentialArea','LandUsePlans','Villages'));
    }

    /**
     * Update the specified irrigated potential area in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\IrrigatedPotentialAreasFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, IrrigatedPotentialAreasFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            $irrigatedPotentialArea = IrrigatedPotentialArea::findOrFail($id);
            $irrigatedPotentialArea->update($data);

            return redirect()->route('admin.irrigated_potential_area.index')
                             ->with('success_message', trans('irrigated_potential_areas.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('irrigated_potential_areas.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified irrigated potential area from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $irrigatedPotentialArea = IrrigatedPotentialArea::findOrFail($id);
            $irrigatedPotentialArea->delete();

            return redirect()->route('admin.irrigated_potential_area.index')
                             ->with('success_message', trans('irrigated_potential_areas.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('irrigated_potential_areas.unexpected_error')]);
        }
    }



}