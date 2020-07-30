<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MineralTypesFormRequest;
use App\Models\MineralType;

class MineralTypesController extends Controller
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
     * Display a listing of the mineral types.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $mineralTypes = MineralType::paginate(25);

        return view('admin.type_minerals.index', compact('mineralTypes'));
    }

    /**
     * Show the form for creating a new mineral type.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.type_minerals.create');
    }

    /**
     * Store a new mineral type in the storage.
     *
     * @param App\Http\Requests\MineralTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(MineralTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            MineralType::create($data);

            return redirect()->route('admin.mineral_type.index')
                             ->with('success_message', trans('mineral_types.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('mineral_types.unexpected_error')]);
        }
    }

    /**
     * Display the specified mineral type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $mineralType = MineralType::findOrFail($id);

        return view('admin.type_minerals.show', compact('mineralType'));
    }

    /**
     * Show the form for editing the specified mineral type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $mineralType = MineralType::findOrFail($id);
        

        return view('admin.type_minerals.edit', compact('mineralType'));
    }

    /**
     * Update the specified mineral type in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\MineralTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, MineralTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $mineralType = MineralType::findOrFail($id);
            $mineralType->update($data);

            return redirect()->route('admin.mineral_type.index')
                             ->with('success_message', trans('mineral_types.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('mineral_types.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified mineral type from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $mineralType = MineralType::findOrFail($id);
            $mineralType->delete();

            return redirect()->route('admin.mineral_type.index')
                             ->with('success_message', trans('mineral_types.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('mineral_types.unexpected_error')]);
        }
    }



}