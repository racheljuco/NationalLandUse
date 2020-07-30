<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LivestockMarketsFormRequest;
use App\Models\Livestock;
use App\Models\LivestockMarket;
use App\Models\LandUsePlan;
use App\Models\Village;

class LivestockMarketsController extends Controller
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
        $livestockMarkets = LivestockMarket::with('landuseplan','village','livestock')->paginate(25);

        return view('admin.livestock_market.index', compact('livestockMarkets'));
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
        
        return view('admin.livestock_market.create', compact('LandUsePlans','Villages','Livestocks'));
    }

    /**
     * Store a new Livestock in the storage.
     *
     * @param App\Http\Requests\LivestockMarketsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(LivestockMarketsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            LivestockMarket::create($data);

            return redirect()->route('admin.livestock_market.index')
                             ->with('success_message', trans('livestock_markets.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('livestock_markets.unexpected_error')]);
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
        $livestockMarket = LivestockMarket::with('landuseplan','village','livestock')->findOrFail($id);

        return view('admin.livestock_market.show', compact('livestockMarket'));
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
        $livestockMarket = LivestockMarket::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Villages = Village::pluck('village_name','id')->all();
        $Livestocks = Livestock::pluck('name','id')->all();

        return view('admin.livestock_market.edit', compact('livestockMarket','LandUsePlans','Villages','Livestocks'));
    }

    /**
     * Update the specified Livestock in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LivestoctMarketsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, LivestockProjetionsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            $livestockMarket = LivestockMarket::findOrFail($id);
            $livestockMarket->update($data);

            return redirect()->route('admin.livestock_market.index')
                             ->with('success_message', trans('livestock_markets.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('livestock_markets.unexpected_error')]);
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
            $livestockmarket = LivestockMarket::findOrFail($id);
            $livestockmarket->delete();

            return redirect()->route('admin.livestock_market.index')
                             ->with('success_message', trans('livestock_markets.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('livestock_markets.unexpected_error')]);
        }
    }



}