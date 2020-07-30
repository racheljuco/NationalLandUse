<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HarvestingMethodsFormRequest;
use App\Models\HarvestingMethod;

class HarvestingMethodsController extends Controller
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
     * Display a listing of the harvesting methods.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $harvestingMethods = HarvestingMethod::paginate(25);

        return view('admin.harvesting_methods.index', compact('harvestingMethods'));
    }

    /**
     * Show the form for creating a new harvesting method.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.harvesting_methods.create');
    }

    /**
     * Store a new harvesting method in the storage.
     *
     * @param App\Http\Requests\HarvestingMethodsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(HarvestingMethodsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            HarvestingMethod::create($data);

            return redirect()->route('admin.harvesting_method.index')
                             ->with('success_message', trans('harvesting_methods.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('harvesting_methods.unexpected_error')]);
        }
    }

    /**
     * Display the specified harvesting method.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $harvestingMethod = HarvestingMethod::findOrFail($id);

        return view('admin.harvesting_methods.show', compact('harvestingMethod'));
    }

    /**
     * Show the form for editing the specified harvesting method.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $harvestingMethod = HarvestingMethod::findOrFail($id);
        

        return view('admin.harvesting_methods.edit', compact('harvestingMethod'));
    }

    /**
     * Update the specified harvesting method in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\HarvestingMethodsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, HarvestingMethodsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $harvestingMethod = HarvestingMethod::findOrFail($id);
            $harvestingMethod->update($data);

            return redirect()->route('admin.harvesting_method.index')
                             ->with('success_message', trans('harvesting_methods.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('harvesting_methods.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified harvesting method from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $harvestingMethod = HarvestingMethod::findOrFail($id);
            $harvestingMethod->delete();

            return redirect()->route('admin.harvesting_method.index')
                             ->with('success_message', trans('harvesting_methods.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('harvesting_methods.unexpected_error')]);
        }
    }



}