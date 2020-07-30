<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandUsePlanFishsFormRequest;
use App\Models\Fish;
use App\Models\LandUsePlan;
use App\Models\LandUsePlanFish;

class LandUsePlanFishsController extends Controller
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
     * Display a listing of the land use plan fishs.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $landUsePlanFishs = LandUsePlanFish::with('landuseplan','fish')->paginate(25);

        return view('admin.land_use_plan_fishs.index', compact('landUsePlanFishs'));
    }

    /**
     * Show the form for creating a new land use plan fish.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Fishs = Fish::pluck('name','id')->all();
        
        return view('admin.land_use_plan_fishs.create', compact('LandUsePlans','Fishs'));
    }

    /**
     * Store a new land use plan fish in the storage.
     *
     * @param App\Http\Requests\LandUsePlanFishsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(LandUsePlanFishsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            LandUsePlanFish::create($data);

            return redirect()->route('admin.land_use_plan_fish.index')
                             ->with('success_message', trans('land_use_plan_fishs.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_fishs.unexpected_error')]);
        }
    }

    /**
     * Display the specified land use plan fish.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $landUsePlanFish = LandUsePlanFish::with('landuseplan','fish')->findOrFail($id);

        return view('admin.land_use_plan_fishs.show', compact('landUsePlanFish'));
    }

    /**
     * Show the form for editing the specified land use plan fish.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $landUsePlanFish = LandUsePlanFish::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Fishs = Fish::pluck('name','id')->all();

        return view('admin.land_use_plan_fishs.edit', compact('landUsePlanFish','LandUsePlans','Fishs'));
    }

    /**
     * Update the specified land use plan fish in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LandUsePlanFishsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, LandUsePlanFishsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $landUsePlanFish = LandUsePlanFish::findOrFail($id);
            $landUsePlanFish->update($data);

            return redirect()->route('admin.land_use_plan_fish.index')
                             ->with('success_message', trans('land_use_plan_fishs.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_fishs.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified land use plan fish from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $landUsePlanFish = LandUsePlanFish::findOrFail($id);
            $landUsePlanFish->delete();

            return redirect()->route('admin.land_use_plan_fish.index')
                             ->with('success_message', trans('land_use_plan_fishs.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_fishs.unexpected_error')]);
        }
    }




}