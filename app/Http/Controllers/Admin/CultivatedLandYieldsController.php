<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CultivatedLandYieldsFormRequest;
use App\Models\Crop;
use App\Models\CultivatedLandYield;
use App\Models\LandUsePlan;
use App\Models\Village;

class CultivatedLandYieldsController extends Controller
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
        $cultivatedLandYields = CultivatedLandYield::with('landuseplan','village','crop')->paginate(25);

        return view('admin.cultivated_land_yield.index', compact('cultivatedLandYields'));
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
$Crops = Crop::pluck('name','id')->all();
        
        return view('admin.cultivated_land_yield.create', compact('LandUsePlans','Villages','Crops'));
    }

    /**
     * Store a new cultivated land yield in the storage.
     *
     * @param App\Http\Requests\CultivatedLandYieldsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(CultivatedLandYieldsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            CultivatedLandYield::create($data);

            return redirect()->route('admin.cultivated_land_yield.index')
                             ->with('success_message', trans('cultivated_land_yields.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('cultivated_land_yields.unexpected_error')]);
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
        $cultivatedLandYield = CultivatedLandYield::with('landuseplan','village','crop')->findOrFail($id);

        return view('admin.cultivated_land_yield.show', compact('cultivatedLandYield'));
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
        $cultivatedLandYield = CultivatedLandYield::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Villages = Village::pluck('village_name','id')->all();
        $Crops = Crop::pluck('name','id')->all();

        return view('admin.cultivated_land_yield.edit', compact('cultivatedLandYield','LandUsePlans','Villages','Crops'));
    }

    /**
     * Update the specified cultivated land yield in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\CultivatedLandYieldsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, CultivatedLandYieldsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            $cultivatedLandYield = CultivatedLandYield::findOrFail($id);
            $cultivatedLandYield->update($data);

            return redirect()->route('admin.cultivated_land_yield.index')
                             ->with('success_message', trans('cultivated_land_yields.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('cultivated_land_yields.unexpected_error')]);
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
            $cultivatedLandYield = CultivatedLandYield::findOrFail($id);
            $cultivatedLandYield->delete();

            return redirect()->route('admin.cultivated_land_yield.index')
                             ->with('success_message', trans('cultivated_land_yields.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('cultivated_land_yields.unexpected_error')]);
        }
    }



}