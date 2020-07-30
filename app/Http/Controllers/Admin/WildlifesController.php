<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WildlifesFormRequest;
use App\Models\Wildlife;
use App\Models\WildlifeType;

class WildlifesController extends Controller
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
     * Display a listing of the wildlifes.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $wildlifes = Wildlife::with('wildlifetype')->paginate(25);

        return view('admin.wildlifes.index', compact('wildlifes'));
    }

    /**
     * Show the form for creating a new wildlife.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $TypeWildlifes = WildlifeType::pluck('name','id')->all();
        
        return view('admin.wildlifes.create', compact('TypeWildlifes'));
    }

    /**
     * Store a new wildlife in the storage.
     *
     * @param App\Http\Requests\WildlifesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(WildlifesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Wildlife::create($data);

            return redirect()->route('admin.wildlife.index')
                             ->with('success_message', trans('wildlifes.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('wildlifes.unexpected_error')]);
        }
    }

    /**
     * Display the specified wildlife.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $wildlife = Wildlife::with('wildlifetype')->findOrFail($id);

        return view('admin.wildlifes.show', compact('wildlife'));
    }

    /**
     * Show the form for editing the specified wildlife.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $wildlife = Wildlife::findOrFail($id);
        $TypeWildlifes = WildlifeType::pluck('name','id')->all();

        return view('admin.wildlifes.edit', compact('wildlife','TypeWildlifes'));
    }

    /**
     * Update the specified wildlife in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\WildlifesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, WildlifesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $wildlife = Wildlife::findOrFail($id);
            $wildlife->update($data);

            return redirect()->route('admin.wildlife.index')
                             ->with('success_message', trans('wildlifes.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('wildlifes.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified wildlife from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $wildlife = Wildlife::findOrFail($id);
            $wildlife->delete();

            return redirect()->route('admin.wildlife.index')
                             ->with('success_message', trans('wildlifes.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('wildlifes.unexpected_error')]);
        }
    }



}