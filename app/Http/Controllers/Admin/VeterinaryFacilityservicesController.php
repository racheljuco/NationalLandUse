<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VeterinaryFacilityservicesFormRequest;
use App\Models\Livestock;
use App\Models\VeterinaryFacilityservice;
use App\Models\LandUsePlan;
use App\Models\Village;

class VeterinaryFacilityservicesController extends Controller
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
     * Display a listing of the cultivated land yields.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $veterinaryFacilityservices = VeterinaryFacilityservice::with('landuseplan','village','livestock')->paginate(25);

        return view('admin.veterinary_facilityservice.index', compact('veterinaryFacilityservices'));
    }

    /**
     * Show the form for creating a new cultivated land yield.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
$Villages = Village::pluck('village_name','id')->all();
$Livestocks = Livestock::pluck('name','id')->all();
        
        return view('admin.veterinary_facilityservice.create', compact('LandUsePlans','Villages','Livestocks'));
    }

    /**
     * Store a new cultivated land yield in the storage.
     *
     * @param App\Http\Requests\veterinaryFacilityservicesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(veterinaryFacilityservicesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            VeterinaryFacilityservice::create($data);

            return redirect()->route('admin.veterinary_facilityservice.index')
                             ->with('success_message', trans('veterinary_facilityservices.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('veterinary_facilityservices.unexpected_error')]);
        }
    }

    /**
     * Display the specified cultivated land yield.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $veterinaryFacilityservice = VeterinaryFacilityservice::with('landuseplan','village','livestock')->findOrFail($id);

        return view('admin.veterinary_facilityservice.show', compact('veterinaryFacilityservice'));
    }

    /**
     * Show the form for editing the specified cultivated land yield.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $veterinaryFacilityservice = VeterinaryFacilityservice::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Villages = Village::pluck('village_name','id')->all();
        $Livestocks = Livestock::pluck('name','id')->all();

        return view('admin.veterinary_facilityservice.edit', compact('veterinaryFacilityservice','LandUsePlans','Villages','Livestocks'));
    }

    /**
     * Update the specified cultivated land yield in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\VeterinaryFacilityservicesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, VeterinaryFacilityservicesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            $veterinaryFacilityservice = VeterinaryFacilityservice::findOrFail($id);
            $veterinaryFacilityservice->update($data);

            return redirect()->route('admin.veterinary_facilityservice.index')
                             ->with('success_message', trans('veterinary_facilityservices.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('veterinary_facilityservices.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified cultivated land yield from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $veterinaryFacilityservice = VeterinaryFacilityservice::findOrFail($id);
            $veterinaryFacilityservice->delete();

            return redirect()->route('admin.veterinary_facilityservice.index')
                             ->with('success_message', trans('veterinary_facilityservices.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('veterinary_facilityservices.unexpected_error')]);
        }
    }



}