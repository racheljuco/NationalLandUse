<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandUsePlanLivestocksFormRequest;
use App\Models\Livestock;
use App\Models\LandUsePlan;
use App\Models\LandUsePlanLivestock;

class LandUsePlanLivestocksController extends Controller
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
     * Display a listing of the land use plan livestocks.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $landUsePlanLivestocks = LandUsePlanLivestock::with('landuseplan','livestock')->paginate(25);

        return view('admin.land_use_plan_livestocks.index', compact('landUsePlanLivestocks'));
    }

    /**
     * Show the form for creating a new land use plan livestock.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Livestocks = Livestock::pluck('name','id')->all();
        
        return view('admin.land_use_plan_livestocks.create', compact('LandUsePlans','Livestocks'));
    }

    /**
     * Store a new land use plan livestock in the storage.
     *
     * @param App\Http\Requests\LandUsePlanLivestocksFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(LandUsePlanLivestocksFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            LandUsePlanLivestock::create($data);

            return redirect()->route('admin.land_use_plan_livestock.index')
                             ->with('success_message', trans('land_use_plan_livestocks.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_livestocks.unexpected_error')]);
        }
    }

    /**
     * Display the specified land use plan livestock.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $landUsePlanLivestock = LandUsePlanLivestock::with('landuseplan','livestock')->findOrFail($id);

        return view('admin.land_use_plan_livestocks.show', compact('landUsePlanLivestock'));
    }

    /**
     * Show the form for editing the specified land use plan livestock.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $landUsePlanLivestock = LandUsePlanLivestock::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Livestocks = Livestock::pluck('name','id')->all();

        return view('admin.land_use_plan_livestocks.edit', compact('landUsePlanLivestock','LandUsePlans','Livestocks'));
    }

    /**
     * Update the specified land use plan livestock in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LandUsePlanLivestocksFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, LandUsePlanLivestocksFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $landUsePlanLivestock = LandUsePlanLivestock::findOrFail($id);
            $landUsePlanLivestock->update($data);

            return redirect()->route('admin.land_use_plan_livestock.index')
                             ->with('success_message', trans('land_use_plan_livestocks.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_livestocks.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified land use plan livestock from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $landUsePlanLivestock = LandUsePlanLivestock::findOrFail($id);
            $landUsePlanLivestock->delete();

            return redirect()->route('admin.land_use_plan_livestock.index')
                             ->with('success_message', trans('land_use_plan_livestocks.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_plan_livestocks.unexpected_error')]);
        }
    }




}