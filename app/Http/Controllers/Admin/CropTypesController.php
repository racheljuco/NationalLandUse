<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CropTypesFormRequest;
use App\Models\CropType;

class CropTypesController extends Controller
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
     * Display a listing of the crop types.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $cropTypes = CropType::paginate(25);

        return view('admin.type_crops.index', compact('cropTypes'));
    }

    /**
     * Show the form for creating a new crop type.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.type_crops.create');
    }

    /**
     * Store a new crop type in the storage.
     *
     * @param App\Http\Requests\CropTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(CropTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            CropType::create($data);

            return redirect()->route('admin.crop_type.index')
                             ->with('success_message', trans('crop_types.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('crop_types.unexpected_error')]);
        }
    }

    /**
     * Display the specified crop type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $cropType = CropType::findOrFail($id);

        return view('admin.type_crops.show', compact('cropType'));
    }

    /**
     * Show the form for editing the specified crop type.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $cropType = CropType::findOrFail($id);
        

        return view('admin.type_crops.edit', compact('cropType'));
    }

    /**
     * Update the specified crop type in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\CropTypesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, CropTypesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $cropType = CropType::findOrFail($id);
            $cropType->update($data);

            return redirect()->route('admin.crop_type.index')
                             ->with('success_message', trans('crop_types.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('crop_types.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified crop type from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $cropType = CropType::findOrFail($id);
            $cropType->delete();

            return redirect()->route('admin.crop_type.index')
                             ->with('success_message', trans('crop_types.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('crop_types.unexpected_error')]);
        }
    }



}