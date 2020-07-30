<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FarmInputsFormRequest;
use App\Models\FarmInput;

class FarmInputsController extends Controller
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
     * Display a listing of the farm inputs.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $farmInputs = FarmInput::paginate(25);

        return view('admin.farm_inputs.index', compact('farmInputs'));
    }

    /**
     * Show the form for creating a new farm input.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.farm_inputs.create');
    }

    /**
     * Store a new farm input in the storage.
     *
     * @param App\Http\Requests\FarmInputsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(FarmInputsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            FarmInput::create($data);

            return redirect()->route('admin.farm_input.index')
                             ->with('success_message', trans('farm_inputs.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('farm_inputs.unexpected_error')]);
        }
    }

    /**
     * Display the specified farm input.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $farmInput = FarmInput::findOrFail($id);

        return view('admin.farm_inputs.show', compact('farmInput'));
    }

    /**
     * Show the form for editing the specified farm input.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $farmInput = FarmInput::findOrFail($id);
        

        return view('admin.farm_inputs.edit', compact('farmInput'));
    }

    /**
     * Update the specified farm input in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\FarmInputsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, FarmInputsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $farmInput = FarmInput::findOrFail($id);
            $farmInput->update($data);

            return redirect()->route('admin.farm_input.index')
                             ->with('success_message', trans('farm_inputs.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('farm_inputs.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified farm input from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $farmInput = FarmInput::findOrFail($id);
            $farmInput->delete();

            return redirect()->route('admin.farm_input.index')
                             ->with('success_message', trans('farm_inputs.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('farm_inputs.unexpected_error')]);
        }
    }



}