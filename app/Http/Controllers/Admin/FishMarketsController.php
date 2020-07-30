<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FishMarketsFormRequest;
use App\Models\Fish;
use App\Models\FishMarket;
use App\Models\LandUsePlan;
use App\Models\Village;

class FishMarketsController extends Controller
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
        $fishMarkets = FishMarket::with('landuseplan','village','fish')->paginate(25);

        return view('admin.fish_market.index', compact('fishMarkets'));
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
$fishs = Fish::pluck('name','id')->all();
        
        return view('admin.fish_market.create', compact('LandUsePlans','Villages','Fishs'));
    }

    /**
     * Store a new Fish in the storage.
     *
     * @param App\Http\Requests\FishMarketsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(FishMarketsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            FishMarket::create($data);

            return redirect()->route('admin.fish_market.index')
                             ->with('success_message', trans('fish_markets.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('fish_markets.unexpected_error')]);
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
        $fishMarket = FishMarket::with('landuseplan','village','fish')->findOrFail($id);

        return view('admin.fish_market.show', compact('fishMarket'));
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
        $fishMarket = FishMarket::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Villages = Village::pluck('village_name','id')->all();
        $Fishs = Fish::pluck('name','id')->all();

        return view('admin.fish_market.edit', compact('fishMarket','LandUsePlans','Villages','Fishs'));
    }

    /**
     * Update the specified Fish in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LivestoctMarketsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, FishProjetionsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            $fishMarket = FishMarket::findOrFail($id);
            $fishMarket->update($data);

            return redirect()->route('admin.fish_market.index')
                             ->with('success_message', trans('fish_markets.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('fish_markets.unexpected_error')]);
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
            $fishmarket = FishMarket::findOrFail($id);
            $fishmarket->delete();

            return redirect()->route('admin.fish_market.index')
                             ->with('success_message', trans('fish_markets.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('fish_markets.unexpected_error')]);
        }
    }



}