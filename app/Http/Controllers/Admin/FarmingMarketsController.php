<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FarmingMarketsFormRequest;
use App\Models\FarmingMarket;

class FarmingMarketsController extends Controller
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
     * Display a listing of the farming markets.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $farmingMarkets = FarmingMarket::paginate(25);

        return view('admin.farming_markets.index', compact('farmingMarkets'));
    }

    /**
     * Show the form for creating a new farming market.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.farming_markets.create');
    }

    /**
     * Store a new farming market in the storage.
     *
     * @param App\Http\Requests\FarmingMarketsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(FarmingMarketsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            FarmingMarket::create($data);

            return redirect()->route('admin.farming_market.index')
                             ->with('success_message', trans('farming_markets.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('farming_markets.unexpected_error')]);
        }
    }

    /**
     * Display the specified farming market.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $farmingMarket = FarmingMarket::findOrFail($id);

        return view('admin.farming_markets.show', compact('farmingMarket'));
    }

    /**
     * Show the form for editing the specified farming market.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $farmingMarket = FarmingMarket::findOrFail($id);
        

        return view('admin.farming_markets.edit', compact('farmingMarket'));
    }

    /**
     * Update the specified farming market in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\FarmingMarketsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, FarmingMarketsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $farmingMarket = FarmingMarket::findOrFail($id);
            $farmingMarket->update($data);

            return redirect()->route('admin.farming_market.index')
                             ->with('success_message', trans('farming_markets.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('farming_markets.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified farming market from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $farmingMarket = FarmingMarket::findOrFail($id);
            $farmingMarket->delete();

            return redirect()->route('admin.farming_market.index')
                             ->with('success_message', trans('farming_markets.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('farming_markets.unexpected_error')]);
        }
    }



}