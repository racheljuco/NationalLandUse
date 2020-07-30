<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WildlifeConservationsFormRequest;
use App\Models\Wildlife;
use App\Models\WildlifeConservation;
use App\Models\LandUsePlan;
use App\Models\Village;

class WildlifeConservationsController extends Controller
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
     * Display a listing of the Wildlifes.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $wildlifeConservations = WildlifeConservation::with('landuseplan','village','wildlife')->paginate(25);

        return view('admin.wildlife_conservation.index', compact('wildlifeConservations'));
    }

    /**
     * Show the form for creating a new wildlife.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
$Villages = Village::pluck('village_name','id')->all();
$Wildlifes = Wildlife::pluck('name','id')->all();
        
        return view('admin.wildlife_conservation.create', compact('LandUsePlans','Villages','Wildlifes'));
    }

    /**
     * Store a new Wildlife in the storage.
     *
     * @param App\Http\Requests\WildlifeConservationsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(WildlifeConservationsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            WildlifeConservation::create($data);

            return redirect()->route('admin.wildlife_conservation.index')
                             ->with('success_message', trans('wildlife_conservations.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('wildlife_conservations.unexpected_error')]);
        }
    }

    /**
     * Display the specified Wildlife.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $wildlifeConservation = WildlifeConservation::with('landuseplan','village','wildlife')->findOrFail($id);

        return view('admin.wildlife_conservation.show', compact('wildlifeConservation'));
    }

    /**
     * Show the form for editing the specified Wildlife.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $wildlifeConservation = WildlifeConservation::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Villages = Village::pluck('village_name','id')->all();
        $Wildlifes = Wildlife::pluck('name','id')->all();

        return view('admin.wildlife_conservation.edit', compact('wildlifeConservation','LandUsePlans','Villages','Wildlifes'));
    }

    /**
     * Update the specified Wildlife in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LivestoctDiseasesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, WildlifeConservationsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            $wildlifeConservation = WildlifeConservation::findOrFail($id);
            $wildlifeConservation->update($data);

            return redirect()->route('admin.wildlife_conservation.index')
                             ->with('success_message', trans('wildlife_conservations.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('wildlife_conservations.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified Wildlife from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $wildlifeConservation = WildlifeConservation::findOrFail($id);
            $wildlifeConservation->delete();

            return redirect()->route('admin.wildlife_conservation.index')
                             ->with('success_message', trans('wildlife_conservations.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('wildlife_conservations.unexpected_error')]);
        }
    }



}