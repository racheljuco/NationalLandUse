<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FishsFormRequest;
use App\Models\Fish;
use App\Models\FishType;

class FishsController extends Controller
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
     * Display a listing of the fishs.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $fishs = Fish::with('fishtype')->paginate(25);

        return view('admin.fishs.index', compact('fishs'));
    }

    /**
     * Show the form for creating a new fish.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $TypeFishs = FishType::pluck('name','id')->all();
        
        return view('admin.fishs.create', compact('TypeFishs'));
    }

    /**
     * Store a new fish in the storage.
     *
     * @param App\Http\Requests\FishsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(FishsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Fish::create($data);

            return redirect()->route('admin.fish.index')
                             ->with('success_message', trans('fishs.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('fishs.unexpected_error')]);
        }
    }

    /**
     * Display the specified fish.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $fish = Fish::with('fishtype')->findOrFail($id);

        return view('admin.fishs.show', compact('fish'));
    }

    /**
     * Show the form for editing the specified fish.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $fish = Fish::findOrFail($id);
        $TypeFishs = FishType::pluck('name','id')->all();

        return view('admin.fishs.edit', compact('fish','TypeFishs'));
    }

    /**
     * Update the specified fish in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\FishsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, FishsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $fish = Fish::findOrFail($id);
            $fish->update($data);

            return redirect()->route('admin.fish.index')
                             ->with('success_message', trans('fishs.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('fishs.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified fish from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $fish = Fish::findOrFail($id);
            $fish->delete();

            return redirect()->route('admin.fish.index')
                             ->with('success_message', trans('fishs.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('fishs.unexpected_error')]);
        }
    }



}