<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VillagesFormRequest;
use App\Models\District;
use App\Models\Village;

class VillagesController extends Controller
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
     * Display a listing of the villages.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $villages = Village::with('district')->paginate(25);

        return view('admin.villages.index', compact('villages'));
    }

    /**
     * Show the form for creating a new village.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Districts = District::pluck('district_name','id')->all();
        
        return view('admin.villages.create', compact('Districts'));
    }

    /**
     * Store a new village in the storage.
     *
     * @param App\Http\Requests\VillagesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(VillagesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Village::create($data);

            return redirect()->route('admin.village.index')
                             ->with('success_message', trans('villages.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('villages.unexpected_error')]);
        }
    }

    /**
     * Display the specified village.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $village = Village::with('district')->findOrFail($id);

        return view('admin.villages.show', compact('village'));
    }

    /**
     * Show the form for editing the specified village.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $village = Village::findOrFail($id);
        $Districts = District::pluck('district_name','id')->all();

        return view('admin.villages.edit', compact('village','Districts'));
    }

    /**
     * Update the specified village in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\VillagesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, VillagesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $village = Village::findOrFail($id);
            $village->update($data);

            return redirect()->route('admin.village.index')
                             ->with('success_message', trans('villages.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('villages.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified village from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $village = Village::findOrFail($id);
            $village->delete();

            return redirect()->route('admin.village.index')
                             ->with('success_message', trans('villages.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('villages.unexpected_error')]);
        }
    }



}