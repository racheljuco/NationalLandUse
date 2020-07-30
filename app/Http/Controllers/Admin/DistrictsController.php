<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DistrictsFormRequest;
use App\Models\District;
use App\Models\Village;
use App\Models\Region;

class DistrictsController extends Controller
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
     * Display a listing of the districts.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $districts = District::with('region')->paginate(25);

        return view('admin.districts.index', compact('districts'));
    }

    /**
     * Show the form for creating a new district.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Regions = Region::pluck('region_name','id')->all();
        
        return view('admin.districts.create', compact('Regions'));
    }

    /**
     * Store a new district in the storage.
     *
     * @param App\Http\Requests\DistrictsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(DistrictsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            District::create($data);

            return redirect()->route('admin.district.index')
                             ->with('success_message', trans('districts.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('districts.unexpected_error')]);
        }
    }

    /**
     * Display the specified district.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $district = District::with('region')->findOrFail($id);

        return view('admin.districts.show', compact('district'));
    }

    /**
     * Show the form for editing the specified district.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $district = District::findOrFail($id);
        $Regions = Region::pluck('region_name','id')->all();

        return view('admin.districts.edit', compact('district','Regions'));
    }

    /**
     * Update the specified district in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\DistrictsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, DistrictsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $district = District::findOrFail($id);
            $district->update($data);

            return redirect()->route('admin.district.index')
                             ->with('success_message', trans('districts.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('districts.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified district from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $district = District::findOrFail($id);
            $district->delete();

            return redirect()->route('admin.district.index')
                             ->with('success_message', trans('districts.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('districts.unexpected_error')]);
        }
    }

    public function getVillages($id){
       //$wards = Ward::where('district_id',$id)->pluck('id')->toArray();
        $villages = Village::where('district_id',$id)->pluck('village_name','id')->all();

        return json_encode($villages);

    }




}