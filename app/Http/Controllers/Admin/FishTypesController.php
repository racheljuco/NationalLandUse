<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FishTypesFormRequest;
use App\Models\FishType;

class FishTypesController extends Controller
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
     * Display a listing of the fish types.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $fishTypes = FishType::paginate(25);

        return view('admin.type_fishs.index', compact('fishTypes'));
    }

    /**
     * Show the form for creating a new fish type.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.type_fishs.create');
    }

    /**
     * Store a new fish type in the storage.
     *
     * @param App\Http\Requests\FishTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(FishTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            FishType::create($data);

            return redirect()->route('admin.fish_type.index')
                             ->with('success_message', trans('fish_types.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('fish_types.unexpected_error')]);
        }
    }

    /**
     * Display the specified fish type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $fishType = FishType::findOrFail($id);

        return view('admin.type_fishs.show', compact('fishType'));
    }

    /**
     * Show the form for editing the specified fish type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $fishType = FishType::findOrFail($id);
        

        return view('admin.type_fishs.edit', compact('fishType'));
    }

    /**
     * Update the specified fish type in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\FishTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, FishTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $fishType = FishType::findOrFail($id);
            $fishType->update($data);

            return redirect()->route('admin.fish_type.index')
                             ->with('success_message', trans('fish_types.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('fish_types.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified fish type from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $fishType = FishType::findOrFail($id);
            $fishType->delete();

            return redirect()->route('admin.fish_type.index')
                             ->with('success_message', trans('fish_types.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('fish_types.unexpected_error')]);
        }
    }



}