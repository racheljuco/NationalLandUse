<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LivestockKeepersFormRequest;
use App\Models\Livestock;
use App\Models\LivestockKeeper;
use App\Models\LandUsePlan;
use App\Models\Village;

class LivestockKeepersController extends Controller
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
        $livestockKeepers = LivestockKeeper::with('landuseplan','village','livestock')->paginate(25);

        return view('admin.livestock_keeper.index', compact('livestockKeepers'));
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
        
        return view('admin.livestock_keeper.create', compact('LandUsePlans','Villages','Livestocks'));
    }

    /**
     * Store a new cultivated land yield in the storage.
     *
     * @param App\Http\Requests\LivestockKeepersFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(LivestockKeepersFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            LivestockKeeper::create($data);

            return redirect()->route('admin.livestock_keeper.index')
                             ->with('success_message', trans('livestock_keepers.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('livestock_keepers.unexpected_error')]);
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
        $livestockKeeper = LivestockKeeper::with('landuseplan','village','livestock')->findOrFail($id);

        return view('admin.livestock_keeper.show', compact('livestockKeeper'));
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
        $livestockKeeper = LivestockKeeper::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Villages = Village::pluck('village_name','id')->all();
        $Livestocks = Livestock::pluck('name','id')->all();

        return view('admin.livestock_keeper.edit', compact('livestockKeeper','LandUsePlans','Villages','Livestocks'));
    }

    /**
     * Update the specified cultivated land yield in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LivestockKeepersFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, LivestockKeepersFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            $livestockKeeper = LivestockKeeper::findOrFail($id);
            $livestockKeeper->update($data);

            return redirect()->route('admin.livestock_keeper.index')
                             ->with('success_message', trans('livestock_keepers.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('livestock_keepers.unexpected_error')]);
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
            $livestockKeeper = LivestockKeeper::findOrFail($id);
            $livestockKeeper->delete();

            return redirect()->route('admin.livestock_keeper.index')
                             ->with('success_message', trans('livestock_keepers.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('livestock_keepers.unexpected_error')]);
        }
    }



}