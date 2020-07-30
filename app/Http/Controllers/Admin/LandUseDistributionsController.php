<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandUseDistributionsFormRequest;
use App\Models\LandUseDistribution;
use App\Models\LandUsePlan;

class LandUseDistributionsController extends Controller
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
     * Display a listing of the land use distributions.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $landUseDistributions = LandUseDistribution::with('landuseplan')->paginate(25);

        return view('admin.land_use_distributions.index', compact('landUseDistributions'));
    }

    /**
     * Show the form for creating a new land use distribution.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        
        return view('admin.land_use_distributions.create', compact('LandUsePlans'));
    }

    /**
     * Store a new land use distribution in the storage.
     *
     * @param App\Http\Requests\LandUseDistributionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(LandUseDistributionsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            LandUseDistribution::create($data);

            return redirect()->route('admin.land_use_distribution.index')
                             ->with('success_message', trans('land_use_distributions.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_distributions.unexpected_error')]);
        }
    }

    /**
     * Display the specified land use distribution.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $landUseDistribution = LandUseDistribution::with('landuseplan')->findOrFail($id);

        return view('admin.land_use_distributions.show', compact('landUseDistribution'));
    }

    /**
     * Show the form for editing the specified land use distribution.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $landUseDistribution = LandUseDistribution::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();

        return view('admin.land_use_distributions.edit', compact('landUseDistribution','LandUsePlans'));
    }

    /**
     * Update the specified land use distribution in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LandUseDistributionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, LandUseDistributionsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $landUseDistribution = LandUseDistribution::findOrFail($id);
            $landUseDistribution->update($data);

            return redirect()->route('admin.land_use_distribution.index')
                             ->with('success_message', trans('land_use_distributions.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_distributions.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified land use distribution from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $landUseDistribution = LandUseDistribution::findOrFail($id);
            $landUseDistribution->delete();

            return redirect()->route('admin.land_use_distribution.index')
                             ->with('success_message', trans('land_use_distributions.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('land_use_distributions.unexpected_error')]);
        }
    }



}