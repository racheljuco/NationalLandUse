<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CattleDistributionsFormRequest;
use App\Models\Livestock;
use App\Models\CattleDistribution;
use App\Models\LandUsePlan;
use App\Models\Village;

class CattleDistributionsController extends Controller
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
        $cattleDistributions = CattleDistribution::with('landuseplan','village','livestock')->paginate(25);

        return view('admin.cattle_distribution.index', compact('cattleDistributions'));
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
        
        return view('admin.cattle_distribution.create', compact('LandUsePlans','Villages','Livestocks'));
    }

    /**
     * Store a new cultivated land yield in the storage.
     *
     * @param App\Http\Requests\CattleDistributionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(cattleDistributionsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            CattleDistribution::create($data);

            return redirect()->route('admin.cattle_distribution.index')
                             ->with('success_message', trans('cattle_distributions.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('cattle_distributions.unexpected_error')]);
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
        $cattleDistribution = CattleDistribution::with('landuseplan','village','livestock')->findOrFail($id);

        return view('admin.cattle_distribution.show', compact('cattleDistribution'));
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
        $cattleDistribution = CattleDistribution::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Villages = Village::pluck('village_name','id')->all();
        $Livestocks = Livestock::pluck('name','id')->all();

        return view('admin.cattle_distribution.edit', compact('cattleDistribution','LandUsePlans','Villages','Livestocks'));
    }

    /**
     * Update the specified cultivated land yield in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\CattleDistributionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, CattleDistributionsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            $cattleDistribution = CattleDistribution::findOrFail($id);
            $cattleDistribution->update($data);

            return redirect()->route('admin.cattle_distribution.index')
                             ->with('success_message', trans('cattle_distributions.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('cattle_distributions.unexpected_error')]);
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
            $cattleDistribution = CattleDistribution::findOrFail($id);
            $cattleDistribution->delete();

            return redirect()->route('admin.cattle_distribution.index')
                             ->with('success_message', trans('cattle_distributions.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('cattle_distributions.unexpected_error')]);
        }
    }



}