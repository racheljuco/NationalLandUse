<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MineralsFormRequest;
use App\Models\Mineral;
use App\Models\MineralType;

class MineralsController extends Controller
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
     * Display a listing of the Minerals.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $minerals = Mineral::with('mineraltype')->paginate(25);

        return view('admin.minerals.index', compact('minerals'));
    }

    /**
     * Show the form for creating a new mineral.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $TypeMinerals = MineralType::pluck('name','id')->all();
        
        return view('admin.minerals.create', compact('TypeMinerals'));
    }

    /**
     * Store a new mineral in the storage.
     *
     * @param App\Http\Requests\MineralsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(MineralsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Mineral::create($data);

            return redirect()->route('admin.mineral.index')
                             ->with('success_message', trans('minerals.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('minerals.unexpected_error')]);
        }
    }

    /**
     * Display the specified mineral.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $mineral = Mineral::with('mineraltype')->findOrFail($id);

        return view('admin.minerals.show', compact('mineral'));
    }

    /**
     * Show the form for editing the specified mineral.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $mineral = Mineral::findOrFail($id);
        $TypeMinerals = MineralType::pluck('name','id')->all();

        return view('admin.minerals.edit', compact('mineral','TypeMinerals'));
    }

    /**
     * Update the specified mineral in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\MineralsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, MineralsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $mineral = Mineral::findOrFail($id);
            $mineral->update($data);

            return redirect()->route('admin.mineral.index')
                             ->with('success_message', trans('minerals.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('minerals.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified mineral from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $mineral = Mineral::findOrFail($id);
            $mineral->delete();

            return redirect()->route('admin.mineral.index')
                             ->with('success_message', trans('minerals.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('minerals.unexpected_error')]);
        }
    }



}