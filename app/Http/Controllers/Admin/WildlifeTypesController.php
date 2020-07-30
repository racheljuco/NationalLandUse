<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WildlifeTypesFormRequest;
use App\Models\WildlifeType;

class WildlifeTypesController extends Controller
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
     * Display a listing of the wildlife types.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $wildlifeTypes = WildlifeType::paginate(25);

        return view('admin.type_wildlifes.index', compact('wildlifeTypes'));
    }

    /**
     * Show the form for creating a new wildlife type.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.type_wildlifes.create');
    }

    /**
     * Store a new wildlife type in the storage.
     *
     * @param App\Http\Requests\WildlifeTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(WildlifeTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            WildlifeType::create($data);

            return redirect()->route('admin.wildlife_type.index')
                             ->with('success_message', trans('wildlife_types.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('wildlife_types.unexpected_error')]);
        }
    }

    /**
     * Display the specified wildlife type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $wildlifeType = WildlifeType::findOrFail($id);

        return view('admin.type_wildlifes.show', compact('wildlifeType'));
    }

    /**
     * Show the form for editing the specified wildlife type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $wildlifeType = WildlifeType::findOrFail($id);
        

        return view('admin.type_wildlifes.edit', compact('wildlifeType'));
    }

    /**
     * Update the specified wildlife type in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\WildlifeTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, WildlifeTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $wildlifeType = WildlifeType::findOrFail($id);
            $wildlifeType->update($data);

            return redirect()->route('admin.wildlife_type.index')
                             ->with('success_message', trans('wildlife_types.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('wildlife_types.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified wildlife type from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $wildlifeType = WildlifeType::findOrFail($id);
            $wildlifeType->delete();

            return redirect()->route('admin.wildlife_type.index')
                             ->with('success_message', trans('wildlife_types.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('wildlife_types.unexpected_error')]);
        }
    }



}