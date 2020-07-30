<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegionsFormRequest;
use App\Models\Region;
use App\Models\District;

class RegionsController extends Controller
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
     * Display a listing of the regions.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $regions = Region::paginate(25);

        return view('admin.regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new region.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.regions.create');
    }

    /**
     * Store a new region in the storage.
     *
     * @param App\Http\Requests\RegionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(RegionsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Region::create($data);

            return redirect()->route('admin.region.index')
                             ->with('success_message', trans('regions.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('regions.unexpected_error')]);
        }
    }

    /**
     * Display the specified region.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $region = Region::findOrFail($id);

        return view('admin.regions.show', compact('region'));
    }

    /**
     * Show the form for editing the specified region.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $region = Region::findOrFail($id);
        

        return view('admin.regions.edit', compact('region'));
    }

    /**
     * Update the specified region in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\RegionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, RegionsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $region = Region::findOrFail($id);
            $region->update($data);

            return redirect()->route('admin.region.index')
                             ->with('success_message', trans('regions.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('regions.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified region from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $region = Region::findOrFail($id);
            $region->delete();

            return redirect()->route('admin.region.index')
                             ->with('success_message', trans('regions.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('regions.unexpected_error')]);
        }
    }

    public function getDistricts($id){
        
        $districts = District::where('region_id',$id)->pluck('district_name','id')->all();
        return json_encode($districts);

    }



}