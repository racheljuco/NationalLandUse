<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FarmingPracticesFormRequest;
use App\Models\FarmingPractice;

class FarmingPracticesController extends Controller
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
     * Display a listing of the farming practices.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $farmingPractices = FarmingPractice::paginate(25);

        return view('admin.farming_practices.index', compact('farmingPractices'));
    }

    /**
     * Show the form for creating a new farming practice.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.farming_practices.create');
    }

    /**
     * Store a new farming practice in the storage.
     *
     * @param App\Http\Requests\FarmingPracticesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(FarmingPracticesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            FarmingPractice::create($data);

            return redirect()->route('admin.farming_practice.index')
                             ->with('success_message', trans('farming_practices.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('farming_practices.unexpected_error')]);
        }
    }

    /**
     * Display the specified farming practice.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $farmingPractice = FarmingPractice::findOrFail($id);

        return view('admin.farming_practices.show', compact('farmingPractice'));
    }

    /**
     * Show the form for editing the specified farming practice.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $farmingPractice = FarmingPractice::findOrFail($id);
        

        return view('admin.farming_practices.edit', compact('farmingPractice'));
    }

    /**
     * Update the specified farming practice in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\FarmingPracticesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, FarmingPracticesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $farmingPractice = FarmingPractice::findOrFail($id);
            $farmingPractice->update($data);

            return redirect()->route('admin.farming_practice.index')
                             ->with('success_message', trans('farming_practices.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('farming_practices.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified farming practice from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $farmingPractice = FarmingPractice::findOrFail($id);
            $farmingPractice->delete();

            return redirect()->route('admin.farming_practice.index')
                             ->with('success_message', trans('farming_practices.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('farming_practices.unexpected_error')]);
        }
    }



}