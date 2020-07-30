<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GazettesFormRequest;
use App\Models\Gazette;
use App\Models\LandUsePlan;

class GazettesController extends Controller
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
     * Display a listing of the gazettes.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $gazettes = Gazette::with('landuseplan')->paginate(25);

        return view('admin.gazette.index', compact('gazettes'));
    }

    /**
     * Show the form for creating a new gazette.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        
        return view('admin.gazette.create', compact('LandUsePlans'));
    }

    /**
     * Store a new gazette in the storage.
     *
     * @param App\Http\Requests\GazettesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(GazettesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Gazette::create($data);

            return redirect()->route('admin.gazette.index')
                             ->with('success_message', trans('gazettes.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('gazettes.unexpected_error')]);
        }
    }

    /**
     * Display the specified gazette.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $gazette = Gazette::with('landuseplan')->findOrFail($id);

        return view('admin.gazette.show', compact('gazette'));
    }

    /**
     * Show the form for editing the specified gazette.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $gazette = Gazette::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();

        return view('admin.gazette.edit', compact('gazette','LandUsePlans'));
    }

    /**
     * Update the specified gazette in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\GazettesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, GazettesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $gazette = Gazette::findOrFail($id);
            $gazette->update($data);

            return redirect()->route('admin.gazette.index')
                             ->with('success_message', trans('gazettes.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('gazettes.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified gazette from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $gazette = Gazette::findOrFail($id);
            $gazette->delete();

            return redirect()->route('admin.gazette.index')
                             ->with('success_message', trans('gazettes.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('gazettes.unexpected_error')]);
        }
    }



}