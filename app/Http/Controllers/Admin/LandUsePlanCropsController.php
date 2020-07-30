<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandUsePlanCropsFormRequest;
use App\Models\Crop;
use App\Models\LandUsePlan;
use App\Models\LandUsePlanCrop;

class LandUsePlanCropsController extends Controller
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
     * Display a listing of the land use plan crops.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $landUsePlanCrops = LandUsePlanCrop::with('landuseplan','crop')->paginate(25);

        return view('admin.land_use_plan_crops.index', compact('landUsePlanCrops'));
    }

    /**
     * Show the form for creating a new land use plan crop.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Crops = Crop::pluck('name','id')->all();
        
        return view('admin.land_use_plan_crops.create', compact('LandUsePlans','Crops'));
    }

    /**
     * Store a new land use plan crop in the storage.
     *
     * @param App\Http\Requests\LandUsePlanCropsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(LandUsePlanCropsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            LandUsePlanCrop::create($data);

            return redirect()->route('admin.land_use_plan_crop.index')
                             ->with('success_message', trans('land_use_plan_crops.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_crops.unexpected_error')]);
        }
    }

    /**
     * Display the specified land use plan crop.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $landUsePlanCrop = LandUsePlanCrop::with('landuseplan','crop')->findOrFail($id);

        return view('admin.land_use_plan_crops.show', compact('landUsePlanCrop'));
    }

    /**
     * Show the form for editing the specified land use plan crop.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $landUsePlanCrop = LandUsePlanCrop::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Crops = Crop::pluck('name','id')->all();

        return view('admin.land_use_plan_crops.edit', compact('landUsePlanCrop','LandUsePlans','Crops'));
    }

    /**
     * Update the specified land use plan crop in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LandUsePlanCropsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, LandUsePlanCropsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $landUsePlanCrop = LandUsePlanCrop::findOrFail($id);
            $landUsePlanCrop->update($data);

            return redirect()->route('admin.land_use_plan_crop.index')
                             ->with('success_message', trans('land_use_plan_crops.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_crops.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified land use plan crop from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $landUsePlanCrop = LandUsePlanCrop::findOrFail($id);
            $landUsePlanCrop->delete();

            return redirect()->route('admin.land_use_plan_crop.index')
                             ->with('success_message', trans('land_use_plan_crops.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_crops.unexpected_error')]);
        }
    }




}