<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandUsePlanStatusesFormRequest;
use App\Models\LandUsePlanStatus;

class LandUsePlanStatusesController extends Controller
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
     * Display a listing of the land use plan statuses.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $landUsePlanStatuses = LandUsePlanStatus::paginate(25);

        return view('admin.land_use_plan_statuses.index', compact('landUsePlanStatuses'));
    }

    /**
     * Show the form for creating a new land use plan status.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.land_use_plan_statuses.create');
    }

    /**
     * Store a new land use plan status in the storage.
     *
     * @param App\Http\Requests\LandUsePlanStatusesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(LandUsePlanStatusesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            LandUsePlanStatus::create($data);

            return redirect()->route('admin.land_use_plan_status.index')
                             ->with('success_message', trans('land_use_plan_statuses.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_statuses.unexpected_error')]);
        }
    }

    /**
     * Display the specified land use plan status.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $landUsePlanStatus = LandUsePlanStatus::findOrFail($id);

        return view('admin.land_use_plan_statuses.show', compact('landUsePlanStatus'));
    }

    /**
     * Show the form for editing the specified land use plan status.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $landUsePlanStatus = LandUsePlanStatus::findOrFail($id);
        

        return view('admin.land_use_plan_statuses.edit', compact('landUsePlanStatus'));
    }

    /**
     * Update the specified land use plan status in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LandUsePlanStatusesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, LandUsePlanStatusesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $landUsePlanStatus = LandUsePlanStatus::findOrFail($id);
            $landUsePlanStatus->update($data);

            return redirect()->route('admin.land_use_plan_status.index')
                             ->with('success_message', trans('land_use_plan_statuses.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_statuses.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified land use plan status from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $landUsePlanStatus = LandUsePlanStatus::findOrFail($id);
            $landUsePlanStatus->delete();

            return redirect()->route('admin.land_use_plan_status.index')
                             ->with('success_message', trans('land_use_plan_statuses.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_statuses.unexpected_error')]);
        }
    }



}