<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CattleKeepersFormRequest;
use App\Models\Livestock;
use App\Models\CattleKeeper;
use App\Models\LandUsePlan;
use App\Models\Village;

class CattleKeepersController extends Controller
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
        $cattleKeepers = CattleKeeper::with('landuseplan','village','livestock')->paginate(25);

        return view('admin.cattle_keeper.index', compact('cattleKeepers'));
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
        
        return view('admin.cattle_keeper.create', compact('LandUsePlans','Villages','Livestocks'));
    }

    /**
     * Store a new Livestock in the storage.
     *
     * @param App\Http\Requests\CattleKeepersFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(CattleKeepersFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            CattleKeeper::create($data);

            return redirect()->route('admin.cattle_keeper.index')
                             ->with('success_message', trans('cattle_keepers.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('cattle_keepers.unexpected_error')]);
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
        $cattleKeeper = CattleKeeper::with('landuseplan','village','livestock')->findOrFail($id);

        return view('admin.cattle_keeper.show', compact('cattleKeeper'));
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
        $cattleKeeper = CattleKeeper::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Villages = Village::pluck('village_name','id')->all();
        $Livestocks = Livestock::pluck('name','id')->all();

        return view('admin.cattle_keeper.edit', compact('cattleKeeper','LandUsePlans','Villages','Livestocks'));
    }

    /**
     * Update the specified Livestock in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LivestoctProjectionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, CattleKeepersFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            $cattleKeeper = CattleKeeper::findOrFail($id);
            $cattleKeeper->update($data);

            return redirect()->route('admin.cattle_keeper.index')
                             ->with('success_message', trans('cattle_keepers.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('cattle_keepers.unexpected_error')]);
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
            $cattleKeeper = CattleKeeper::findOrFail($id);
            $cattleKeeper->delete();

            return redirect()->route('admin.cattle_keeper.index')
                             ->with('success_message', trans('cattle_keepers.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('cattle_keepers.unexpected_error')]);
        }
    }



}