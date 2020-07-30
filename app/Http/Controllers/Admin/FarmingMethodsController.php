<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FarmingMethodsFormRequest;
use App\Models\FarmingMethod;

class FarmingMethodsController extends Controller
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
     * Display a listing of the farming methods.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $farmingMethods = FarmingMethod::paginate(25);

        return view('admin.farming_methods.index', compact('farmingMethods'));
    }

    /**
     * Show the form for creating a new farming method.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.farming_methods.create');
    }

    /**
     * Store a new farming method in the storage.
     *
     * @param App\Http\Requests\FarmingMethodsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(FarmingMethodsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            FarmingMethod::create($data);

            return redirect()->route('admin.farming_method.index')
                             ->with('success_message', trans('farming_methods.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('farming_methods.unexpected_error')]);
        }
    }

    /**
     * Display the specified farming method.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $farmingMethod = FarmingMethod::findOrFail($id);

        return view('admin.farming_methods.show', compact('farmingMethod'));
    }

    /**
     * Show the form for editing the specified farming method.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $farmingMethod = FarmingMethod::findOrFail($id);
        

        return view('admin.farming_methods.edit', compact('farmingMethod'));
    }

    /**
     * Update the specified farming method in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\FarmingMethodsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, FarmingMethodsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $farmingMethod = FarmingMethod::findOrFail($id);
            $farmingMethod->update($data);

            return redirect()->route('admin.farming_method.index')
                             ->with('success_message', trans('farming_methods.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('farming_methods.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified farming method from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $farmingMethod = FarmingMethod::findOrFail($id);
            $farmingMethod->delete();

            return redirect()->route('admin.farming_method.index')
                             ->with('success_message', trans('farming_methods.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('farming_methods.unexpected_error')]);
        }
    }



}