<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandUsePlansFormRequest;
use App\Models\LandUsePlan;
use App\Models\LandUsePlanStatus;
use App\Models\Village;

class LandUsePlansController extends Controller
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
     * Display a listing of the land use plans.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $landUsePlans = LandUsePlan::with('village','landuseplanstatus')->paginate(25);

        return view('admin.land_use_plans.index', compact('landUsePlans'));
    }

    /**
     * Show the form for creating a new land use plan.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Villages = Village::pluck('village_name','id')->all();
        $LandUsePlanStatuses = LandUsePlanStatus::pluck('name','id')->all();
        
        return view('admin.land_use_plans.create', compact('Villages','LandUsePlanStatuses'));
    }

    /**
     * Store a new land use plan in the storage.
     *
     * @param App\Http\Requests\LandUsePlansFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(LandUsePlansFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            if($request->hasFile('file')){
               
                $extension = $request->file('file')->extension();
                $filename= "landuseplan".date("Y_m_d_h_i_s").'.'.$extension;
                $path = $request->file('file')->storeAs('/landuseplans',$filename,'public');
                $data['file']= $path;
            }
            
            LandUsePlan::create($data);

            return redirect()->route('admin.land_use_plan.index')
                             ->with('success_message', trans('land_use_plans.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plans.unexpected_error')]);
        }
    }

    /**
     * Display the specified land use plan.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $landUsePlan = LandUsePlan::with('village','landuseplanstatus')->findOrFail($id);

        return view('admin.land_use_plans.show', compact('landUsePlan'));
    }

    /**
     * Show the form for editing the specified land use plan.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $landUsePlan = LandUsePlan::findOrFail($id);
        $Villages = Village::pluck('village_name','id')->all();
        $LandUsePlanStatuses = LandUsePlanStatus::pluck('name','id')->all();

        return view('admin.land_use_plans.edit', compact('landUsePlan','Villages','LandUsePlanStatuses'));
    }

    /**
     * Update the specified land use plan in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LandUsePlansFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, LandUsePlansFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $landUsePlan = LandUsePlan::findOrFail($id);

            if($request->hasFile('file')){
               
                $extension = $request->file('file')->extension();
                $filename= "landuseplan".date("Y_m_d_h_i_s").'.'.$extension;
                $path = $request->file('file')->storeAs('/landuseplans',$filename,'public');
                $data['file']= $path;
            }
            
            $landUsePlan->update($data);

            return redirect()->route('admin.land_use_plan.index')
                             ->with('success_message', trans('land_use_plans.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plans.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified land use plan from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $landUsePlan = LandUsePlan::findOrFail($id);
            $landUsePlan->delete();

            return redirect()->route('admin.land_use_plan.index')
                             ->with('success_message', trans('land_use_plans.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plans.unexpected_error')]);
        }
    }



}