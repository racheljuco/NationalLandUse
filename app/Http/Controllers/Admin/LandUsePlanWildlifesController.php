<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandUsePlanWildlifesFormRequest;
use App\Models\Wildlife;
use App\Models\LandUsePlan;
use App\Models\LandUsePlanWildlife;

class LandUsePlanWildlifesController extends Controller
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
     * Display a listing of the land use plan wildlifes.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $landUsePlanWildlifes = LandUsePlanWildlife::with('landuseplan','wildlife')->paginate(25);

        return view('admin.land_use_plan_wildlifes.index', compact('landUsePlanWildlifes'));
    }

    /**
     * Show the form for creating a new land use plan wildlife.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Wildlifes = Wildlife::pluck('name','id')->all();
        
        return view('admin.land_use_plan_wildlifes.create', compact('LandUsePlans','wildlifes'));
    }

    /**
     * Store a new land use plan wildlife in the storage.
     *
     * @param App\Http\Requests\LandUsePlanWildlifesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(LandUsePlanWildlifesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            LandUsePlanWildlife::create($data);

            return redirect()->route('admin.land_use_plan_wildlife.index')
                             ->with('success_message', trans('land_use_plan_wildlifes.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_wildlifes.unexpected_error')]);
        }
    }

    /**
     * Display the specified land use plan wildlife.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $landUsePlanWildlife = LandUsePlanWildlife::with('landuseplan','wildlife')->findOrFail($id);

        return view('admin.land_use_plan_wildlifes.show', compact('landUsePlanWildlife'));
    }

    /**
     * Show the form for editing the specified land use plan wildlife.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $landUsePlanWildlife = LandUsePlanWildlife::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Wildlifes = Wildlife::pluck('name','id')->all();

        return view('admin.land_use_plan_wildlifes.edit', compact('landUsePlanWildlife','LandUsePlans','Wildlifes'));
    }

    /**
     * Update the specified land use plan wildlife in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LandUsePlanWildlifesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, LandUsePlanWildlifesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $landUsePlanWildlife = LandUsePlanWildlife::findOrFail($id);
            $landUsePlanWildlife->update($data);

            return redirect()->route('admin.land_use_plan_wildlife.index')
                             ->with('success_message', trans('land_use_plan_wildlifes.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_wildlifes.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified land use plan wildlife from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $landUsePlanWildlife = LandUsePlanWildlife::findOrFail($id);
            $landUsePlanWildlife->delete();

            return redirect()->route('admin.land_use_plan_wildlife.index')
                             ->with('success_message', trans('land_use_plan_wildlifes.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_wildlifes.unexpected_error')]);
        }
    }




}