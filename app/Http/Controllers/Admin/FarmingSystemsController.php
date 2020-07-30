<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FarmingSystemsFormRequest;
use App\Models\FarmingSystem;

class FarmingSystemsController extends Controller
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
     * Display a listing of the farming systems.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $farmingSystems = FarmingSystem::paginate(25);

        return view('admin.farming_systems.index', compact('farmingSystems'));
    }

    /**
     * Show the form for creating a new farming system.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.farming_systems.create');
    }

    /**
     * Store a new farming system in the storage.
     *
     * @param App\Http\Requests\FarmingSystemsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(FarmingSystemsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            FarmingSystem::create($data);

            return redirect()->route('admin.farming_system.index')
                             ->with('success_message', trans('farming_systems.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('farming_systems.unexpected_error')]);
        }
    }

    /**
     * Display the specified farming system.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $farmingSystem = FarmingSystem::findOrFail($id);

        return view('admin.farming_systems.show', compact('farmingSystem'));
    }

    /**
     * Show the form for editing the specified farming system.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $farmingSystem = FarmingSystem::findOrFail($id);
        

        return view('admin.farming_systems.edit', compact('farmingSystem'));
    }

    /**
     * Update the specified farming system in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\FarmingSystemsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, FarmingSystemsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $farmingSystem = FarmingSystem::findOrFail($id);
            $farmingSystem->update($data);

            return redirect()->route('admin.farming_system.index')
                             ->with('success_message', trans('farming_systems.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('farming_systems.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified farming system from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $farmingSystem = FarmingSystem::findOrFail($id);
            $farmingSystem->delete();

            return redirect()->route('admin.farming_system.index')
                             ->with('success_message', trans('farming_systems.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('farming_systems.unexpected_error')]);
        }
    }



}