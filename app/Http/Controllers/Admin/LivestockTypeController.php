<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LivestockTypesFormRequest;
use App\Models\LivestockType;

class LivestockTypesController extends Controller
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
     * Display a listing of the livestock types.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $livestockTypes = LivestockType::paginate(25);

        return view('admin.type_livestocks.index', compact('livestockTypes'));
    }

    /**
     * Show the form for creating a new livestock type.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.type_livestocks.create');
    }

    /**
     * Store a new livestock type in the storage.
     *
     * @param App\Http\Requests\LivestockTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(LivestockTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            LivestockType::create($data);

            return redirect()->route('admin.livestock_type.index')
                             ->with('success_message', trans('livestock_types.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('livestock_types.unexpected_error')]);
        }
    }

    /**
     * Display the specified livestock type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $livestockType = LivestockType::findOrFail($id);

        return view('admin.type_livestocks.show', compact('livestockType'));
    }

    /**
     * Show the form for editing the specified livestock type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $livestockType = LivestockType::findOrFail($id);
        

        return view('admin.type_livestocks.edit', compact('livestockType'));
    }

    /**
     * Update the specified livestock type in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LivestockTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, LivestockTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $livestockType = LivestockType::findOrFail($id);
            $livestockType->update($data);

            return redirect()->route('admin.livestock_type.index')
                             ->with('success_message', trans('livestock_types.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('livestock_types.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified livestock type from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $livestockType = LivestockType::findOrFail($id);
            $livestockType->delete();

            return redirect()->route('admin.livestock_type.index')
                             ->with('success_message', trans('livestock_types.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('livestock_types.unexpected_error')]);
        }
    }



}