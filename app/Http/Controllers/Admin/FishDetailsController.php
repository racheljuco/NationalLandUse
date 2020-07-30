<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FishDetailsFormRequest;
use App\Models\Fish;
use App\Models\FishDetail;
use App\Models\LandUsePlan;
use App\Models\Village;

class FishDetailsController extends Controller
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
     * Display a listing of the Fishs.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $fishDetails = FishDetail::with('landuseplan','village','fish')->paginate(25);

        return view('admin.fish_detail.index', compact('fishDetails'));
    }

    /**
     * Show the form for creating a new Fish.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
$Villages = Village::pluck('village_name','id')->all();
$Fishs = Fish::pluck('name','id')->all();
        
        return view('admin.fish_detail.create', compact('LandUsePlans','Villages','Fishs'));
    }

    /**
     * Store a new Fish in the storage.
     *
     * @param App\Http\Requests\FishDetailsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(FishDetailsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            FishDetail::create($data);

            return redirect()->route('admin.fishDetail.index')
                             ->with('success_message', trans('fish_details.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('fish_details.unexpected_error')]);
        }
    }

    /**
     * Display the specified Fish.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $fishDetail = FishDetail::with('landuseplan','village','fish')->findOrFail($id);

        return view('admin.fish_detail.show', compact('fishDetail'));
    }

    /**
     * Show the form for editing the specified Fish.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $fishDetail = FishDetail::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Villages = Village::pluck('village_name','id')->all();
        $Fishs = Fish::pluck('name','id')->all();

        return view('admin.fish_detail.edit', compact('fishDetail','LandUsePlans','Villages','Fishs'));
    }

    /**
     * Update the specified Fish in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LivestoctProjectionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, FishDetailsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            $fishDetail = FishDetail::findOrFail($id);
            $fishDetail->update($data);

            return redirect()->route('admin.fish_detail.index')
                             ->with('success_message', trans('fish_details.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('fish_details.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified Fish from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $fishDetail = FishDetail::findOrFail($id);
            $fishDetail->delete();

            return redirect()->route('admin.fish_detail.index')
                             ->with('success_message', trans('fish_details.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('fish_details.unexpected_error')]);
        }
    }



}