<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WardsFormRequest;
use App\Models\District;
use App\Models\Ward;

class WardsController extends Controller
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
     * Display a listing of the wards.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $wards = Ward::with('district')->paginate(25);

        return view('admin.wards.index', compact('wards'));
    }

    /**
     * Show the form for creating a new ward.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Districts = District::pluck('district_name','id')->all();
        
        return view('admin.wards.create', compact('Districts'));
    }

    /**
     * Store a new ward in the storage.
     *
     * @param App\Http\Requests\WardsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(WardsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Ward::create($data);

            return redirect()->route('admin.ward.index')
                             ->with('success_message', trans('wards.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('wards.unexpected_error')]);
        }
    }

    /**
     * Display the specified ward.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $ward = Ward::with('district')->findOrFail($id);

        return view('admin.wards.show', compact('ward'));
    }

    /**
     * Show the form for editing the specified ward.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $ward = Ward::findOrFail($id);
        $Districts = District::pluck('district_name','id')->all();

        return view('admin.wards.edit', compact('ward','Districts'));
    }

    /**
     * Update the specified ward in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\WardsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, WardsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $ward = Ward::findOrFail($id);
            $ward->update($data);

            return redirect()->route('admin.ward.index')
                             ->with('success_message', trans('wards.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('wards.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified ward from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $ward = Ward::findOrFail($id);
            $ward->delete();

            return redirect()->route('admin.ward.index')
                             ->with('success_message', trans('wards.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('wards.unexpected_error')]);
        }
    }



}