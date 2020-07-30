<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CropsFormRequest;
use App\Models\Crop;
use App\Models\CropType;

class CropsController extends Controller
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
     * Display a listing of the crops.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $crops = Crop::with('croptype')->paginate(25);

        return view('admin.crops.index', compact('crops'));
    }

    /**
     * Show the form for creating a new crop.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $TypeCrops = CropType::pluck('name','id')->all();
        
        return view('admin.crops.create', compact('TypeCrops'));
    }

    /**
     * Store a new crop in the storage.
     *
     * @param App\Http\Requests\CropsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(CropsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Crop::create($data);

            return redirect()->route('admin.crop.index')
                             ->with('success_message', trans('crops.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('crops.unexpected_error')]);
        }
    }

    /**
     * Display the specified crop.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $crop = Crop::with('croptype')->findOrFail($id);

        return view('admin.crops.show', compact('crop'));
    }

    /**
     * Show the form for editing the specified crop.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $crop = Crop::findOrFail($id);
        $TypeCrops = CropType::pluck('name','id')->all();

        return view('admin.crops.edit', compact('crop','TypeCrops'));
    }

    /**
     * Update the specified crop in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\CropsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, CropsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $crop = Crop::findOrFail($id);
            $crop->update($data);

            return redirect()->route('admin.crop.index')
                             ->with('success_message', trans('crops.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('crops.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified crop from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $crop = Crop::findOrFail($id);
            $crop->delete();

            return redirect()->route('admin.crop.index')
                             ->with('success_message', trans('crops.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('crops.unexpected_error')]);
        }
    }



}