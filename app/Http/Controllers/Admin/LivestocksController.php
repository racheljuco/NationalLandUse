<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LivestocksFormRequest;
use App\Models\Livestock;
use App\Models\LivestockType;

class LivestocksController extends Controller
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
     * Display a listing of the livestocks.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $livestocks = Livestock::with('livestocktype')->paginate(25);

        return view('admin.livestocks.index', compact('livestocks'));
    }

    /**
     * Show the form for creating a new livestock.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $TypeLivestocks = LivestockType::pluck('name','id')->all();
        
        return view('admin.livestocks.create', compact('TypeLivestocks'));
    }

    /**
     * Store a new livestock in the storage.
     *
     * @param App\Http\Requests\LivestocksFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(LivestocksFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Livestock::create($data);

            return redirect()->route('admin.livestock.index')
                             ->with('success_message', trans('livestocks.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('livestocks.unexpected_error')]);
        }
    }

    /**
     * Display the specified livestock.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $livestock = Livestock::with('livestocktype')->findOrFail($id);

        return view('admin.livestocks.show', compact('livestock'));
    }

    /**
     * Show the form for editing the specified livestock.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $livestock = Livestock::findOrFail($id);
        $TypeLivestocks = LivestockType::pluck('name','id')->all();

        return view('admin.livestocks.edit', compact('livestock','TypeLivestocks'));
    }

    /**
     * Update the specified livestock in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LivestocksFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, LivestocksFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $livestock = Livestock::findOrFail($id);
            $livestock->update($data);

            return redirect()->route('admin.livestock.index')
                             ->with('success_message', trans('livestocks.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('livestocks.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified livestock from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $livestock = Livestock::findOrFail($id);
            $livestock->delete();

            return redirect()->route('admin.livestock.index')
                             ->with('success_message', trans('livestocks.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('livestocks.unexpected_error')]);
        }
    }



}