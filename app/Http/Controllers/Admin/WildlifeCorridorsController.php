<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WildlifeCorridorsFormRequest;
use App\Models\Wildlife;
use App\Models\WildlifeCorridor;
use App\Models\LandUsePlan;
use App\Models\Village;

class WildlifeCorridorsController extends Controller
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
        $wildlifeCorridors = WildlifeCorridor::with('landuseplan','village','wildlife')->paginate(25);

        return view('admin.wildlife_corridor.index', compact('wildlifeCorridors'));
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
        
        return view('admin.wildlife_corridor.create', compact('LandUsePlans','Villages','Wildlifes'));
    }

    /**
     * Store a new Wildlife in the storage.
     *
     * @param App\Http\Requests\WildlifeCorridorsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(WildlifeCorridorsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            WildlifeCorridor::create($data);

            return redirect()->route('admin.wildlife_corridor.index')
                             ->with('success_message', trans('wildlife_corridors.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('wildlife_corridors.unexpected_error')]);
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
        $wildlifeCorridor = WildlifeCorridor::with('landuseplan','village','wildlife')->findOrFail($id);

        return view('admin.wildlife_corridor.show', compact('wildlifeCorridor'));
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
        $wildlifeCorridor = WildlifeCorridor::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Villages = Village::pluck('village_name','id')->all();
        $Wildlifes = Wildlife::pluck('name','id')->all();

        return view('admin.wildlife_corridor.edit', compact('wildlifeCorridor','LandUsePlans','Villages','Wildlifes'));
    }

    /**
     * Update the specified Wildlife in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LivestoctDiseasesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, WildlifeCorridorsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            $wildlifeCorridor = WildlifeCorridor::findOrFail($id);
            $wildlifeCorridor->update($data);

            return redirect()->route('admin.wildlife_corridor.index')
                             ->with('success_message', trans('wildlife_corridors.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('wildlife_corridors.unexpected_error')]);
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
            $wildlifeCorridor = WildlifeCorridor::findOrFail($id);
            $wildlifeCorridor->delete();

            return redirect()->route('admin.wildlife_corridor.index')
                             ->with('success_message', trans('wildlife_corridors.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('wildlife_corridors.unexpected_error')]);
        }
    }



}