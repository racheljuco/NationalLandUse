<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HamletsFormRequest;
use App\Models\Hamlet;
use App\Models\Village;

class HamletsController extends Controller
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
     * Display a listing of the hamlets.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $hamlets = Hamlet::with('village')->paginate(25);

        return view('admin.hamlets.index', compact('hamlets'));
    }

    /**
     * Show the form for creating a new hamlet.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Villages = Village::pluck('village_name','id')->all();
        
        return view('admin.hamlets.create', compact('Villages'));
    }

    /**
     * Store a new hamlet in the storage.
     *
     * @param App\Http\Requests\HamletsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(HamletsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Hamlet::create($data);

            return redirect()->route('admin.hamlet.index')
                             ->with('success_message', trans('hamlets.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('hamlets.unexpected_error')]);
        }
    }

    /**
     * Display the specified hamlet.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $hamlet = Hamlet::with('village')->findOrFail($id);

        return view('admin.hamlets.show', compact('hamlet'));
    }

    /**
     * Show the form for editing the specified hamlet.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $hamlet = Hamlet::findOrFail($id);
        $Villages = Village::pluck('village_name','id')->all();

        return view('admin.hamlets.edit', compact('hamlet','Villages'));
    }

    /**
     * Update the specified hamlet in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\HamletsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, HamletsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $hamlet = Hamlet::findOrFail($id);
            $hamlet->update($data);

            return redirect()->route('admin.hamlet.index')
                             ->with('success_message', trans('hamlets.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('hamlets.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified hamlet from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $hamlet = Hamlet::findOrFail($id);
            $hamlet->delete();

            return redirect()->route('admin.hamlet.index')
                             ->with('success_message', trans('hamlets.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('hamlets.unexpected_error')]);
        }
    }



}