<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GrazingLandsFormRequest;
use App\Models\Livestock;
use App\Models\GrazingLand;
use App\Models\LandUsePlan;
use App\Models\Village;

class GrazingLandsController extends Controller
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
        $grazingLands = GrazingLand::with('landuseplan','village','livestock')->paginate(25);

        return view('admin.grazzing_land.index', compact('grazingLands'));
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
        
        return view('admin.grazzing_land.create', compact('LandUsePlans','Villages','Livestocks'));
    }

    /**
     * Store a new cultivated land yield in the storage.
     *
     * @param App\Http\Requests\grazingLandsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(grazingLandsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            GrazingLand::create($data);

            return redirect()->route('admin.grazzing_land.index')
                             ->with('success_message', trans('grazzing_lands.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('grazzing_lands.unexpected_error')]);
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
        $grazingLand = GrazingLand::with('landuseplan','village','livestock')->findOrFail($id);

        return view('admin.grazzing_land.show', compact('grazingLand'));
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
        $grazingLand = GrazingLand::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Villages = Village::pluck('village_name','id')->all();
        $Livestocks = Livestock::pluck('name','id')->all();

        return view('admin.grazzing_land.edit', compact('grazingLand','LandUsePlans','Villages','Livestocks'));
    }

    /**
     * Update the specified cultivated land yield in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\GrazingLandsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, GrazingLandsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            $grazingLand = GrazingLand::findOrFail($id);
            $grazingLand->update($data);

            return redirect()->route('admin.grazzing_land.index')
                             ->with('success_message', trans('grazzing_lands.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('grazzing_lands.unexpected_error')]);
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
            $grazingLand = GrazingLand::findOrFail($id);
            $grazingLand->delete();

            return redirect()->route('admin.grazzing_land.index')
                             ->with('success_message', trans('grazzing_lands.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('grazzing_lands.unexpected_error')]);
        }
    }



}