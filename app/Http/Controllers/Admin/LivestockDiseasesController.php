<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LivestockDiseasesFormRequest;
use App\Models\Livestock;
use App\Models\LivestockDisease;
use App\Models\LandUsePlan;
use App\Models\Village;

class LivestockDiseasesController extends Controller
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
     * Display a listing of the Livestocks.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $livestockDiseases = LivestockDisease::with('landuseplan','village','livestock')->paginate(25);

        return view('admin.livestock_disease.index', compact('livestockDiseases'));
    }

    /**
     * Show the form for creating a new Livestock.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
$Villages = Village::pluck('village_name','id')->all();
$Livestocks = Livestock::pluck('name','id')->all();
        
        return view('admin.livestock_disease.create', compact('LandUsePlans','Villages','Livestocks'));
    }

    /**
     * Store a new Livestock in the storage.
     *
     * @param App\Http\Requests\LivestockDiseasesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(LivestockDiseasesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            LivestockDisease::create($data);

            return redirect()->route('admin.livestock_disease.index')
                             ->with('success_message', trans('livestock_diseases.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('livestock_diseases.unexpected_error')]);
        }
    }

    /**
     * Display the specified Livestock.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $livestockDisease = LivestockDisease::with('landuseplan','village','livestock')->findOrFail($id);

        return view('admin.livestock_disease.show', compact('livestockDisease'));
    }

    /**
     * Show the form for editing the specified Livestock.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $livestockDisease = LivestockDisease::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Villages = Village::pluck('village_name','id')->all();
        $Livestocks = Livestock::pluck('name','id')->all();

        return view('admin.livestock_disease.edit', compact('livestockDisease','LandUsePlans','Villages','Livestocks'));
    }

    /**
     * Update the specified Livestock in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LivestoctDiseasesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, LivestockDiseasesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            $livestockDisease = LivestockDisease::findOrFail($id);
            $livestockDisease->update($data);

            return redirect()->route('admin.livestock_disease.index')
                             ->with('success_message', trans('livestock_diseases.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('livestock_diseases.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified Livestock from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $livestockdisease = LivestockDisease::findOrFail($id);
            $livestockdisease->delete();

            return redirect()->route('admin.livestock_disease.index')
                             ->with('success_message', trans('livestock_diseases.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('livestock_diseases.unexpected_error')]);
        }
    }



}