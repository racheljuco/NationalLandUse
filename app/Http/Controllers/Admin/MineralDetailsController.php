<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MineralDetailsFormRequest;
use App\Models\Mineral;
use App\Models\MineralDetail;
use App\Models\LandUsePlan;
use App\Models\Village;

class MineralDetailsController extends Controller
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
     * Display a listing of the Minerals.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $mineralDetails = MineralDetail::with('landuseplan','village','mineral')->paginate(25);

        return view('admin.mineral_detail.index', compact('mineralDetails'));
    }

    /**
     * Show the form for creating a new Mineral.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
$Villages = Village::pluck('village_name','id')->all();
$Minerals = Mineral::pluck('name','id')->all();
        
        return view('admin.mineral_detail.create', compact('LandUsePlans','Villages','Minerals'));
    }

    /**
     * Store a new Mineral in the storage.
     *
     * @param App\Http\Requests\MineralDetailsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(MineralDetailsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            MineralDetail::create($data);

            return redirect()->route('admin.MineralDetail.index')
                             ->with('success_message', trans('mineral_details.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('mineral_details.unexpected_error')]);
        }
    }

    /**
     * Display the specified Mineral.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $mineralDetail = MineralDetail::with('landuseplan','village','mineral')->findOrFail($id);

        return view('admin.mineral_detail.show', compact('mineralDetail'));
    }

    /**
     * Show the form for editing the specified Mineral.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $mineralDetail = MineralDetail::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Villages = Village::pluck('village_name','id')->all();
        $Minerals = Mineral::pluck('name','id')->all();

        return view('admin.mineral_detail.edit', compact('mineralDetail','LandUsePlans','Villages','Minerals'));
    }

    /**
     * Update the specified Mineral in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LivestoctProjectionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, MineralDetailsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            $mineralDetail = MineralDetail::findOrFail($id);
            $mineralDetail->update($data);

            return redirect()->route('admin.mineral_detail.index')
                             ->with('success_message', trans('mineral_details.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('mineral_details.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified Mineral from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $mineralDetail = MineralDetail::findOrFail($id);
            $mineralDetail->delete();

            return redirect()->route('admin.mineral_detail.index')
                             ->with('success_message', trans('mineral_details.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('mineral_details.unexpected_error')]);
        }
    }



}