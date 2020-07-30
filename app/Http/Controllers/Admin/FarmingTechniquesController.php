<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FarmingTechniquesFormRequest;
use App\Models\FarmingTechnique;

class FarmingTechniquesController extends Controller
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
     * Display a listing of the farming techniques.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $farmingTechniques = FarmingTechnique::paginate(25);

        return view('admin.farming_techniques.index', compact('farmingTechniques'));
    }

    /**
     * Show the form for creating a new farming technique.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.farming_techniques.create');
    }

    /**
     * Store a new farming technique in the storage.
     *
     * @param App\Http\Requests\FarmingTechniquesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(FarmingTechniquesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            FarmingTechnique::create($data);

            return redirect()->route('admin.farming_technique.index')
                             ->with('success_message', trans('farming_techniques.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('farming_techniques.unexpected_error')]);
        }
    }

    /**
     * Display the specified farming technique.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $farmingTechnique = FarmingTechnique::findOrFail($id);

        return view('admin.farming_techniques.show', compact('farmingTechnique'));
    }

    /**
     * Show the form for editing the specified farming technique.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $farmingTechnique = FarmingTechnique::findOrFail($id);
        

        return view('admin.farming_techniques.edit', compact('farmingTechnique'));
    }

    /**
     * Update the specified farming technique in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\FarmingTechniquesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, FarmingTechniquesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $farmingTechnique = FarmingTechnique::findOrFail($id);
            $farmingTechnique->update($data);

            return redirect()->route('admin.farming_technique.index')
                             ->with('success_message', trans('farming_techniques.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('farming_techniques.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified farming technique from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $farmingTechnique = FarmingTechnique::findOrFail($id);
            $farmingTechnique->delete();

            return redirect()->route('admin.farming_technique.index')
                             ->with('success_message', trans('farming_techniques.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('farming_techniques.unexpected_error')]);
        }
    }



}