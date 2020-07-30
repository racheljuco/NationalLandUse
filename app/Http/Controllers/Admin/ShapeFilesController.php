<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShapeFilesFormRequest;
use App\Models\LandUsePlan;
use App\Models\ShapeFile;

class ShapeFilesController extends Controller
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
     * Display a listing of the shape files.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $shapeFiles = ShapeFile::with('landuseplan')->paginate(25);

        return view('admin.shapefiles.index', compact('shapeFiles'));
    }

    /**
     * Show the form for creating a new shape file.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        
        return view('admin.shapefiles.create', compact('LandUsePlans'));
    }

    /**
     * Store a new shape file in the storage.
     *
     * @param App\Http\Requests\ShapeFilesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(ShapeFilesFormRequest $request)
    {
        try {
            
            $data = $request->getData();

            if($request->hasFile('filepath')){
               
                $extension = $request->file('filepath')->extension();
                $filename= date("Y_m_d_h_i_s").'.'.$extension;
                $path = $request->file('filepath')->storeAs('/shapefiles',$filename,'public');
                $data['filepath']= $path;
            }

            
            ShapeFile::create($data);

            return redirect()->route('admin.shape_file.index')
                             ->with('success_message', trans('shape_files.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('shape_files.unexpected_error')]);
        }
    }

    /**
     * Display the specified shape file.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $shapeFile = ShapeFile::with('landuseplan')->findOrFail($id);

        return view('admin.shapefiles.show', compact('shapeFile'));
    }

    /**
     * Show the form for editing the specified shape file.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $shapeFile = ShapeFile::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();

        return view('admin.shapefiles.edit', compact('shapeFile','LandUsePlans'));
    }

    /**
     * Update the specified shape file in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\ShapeFilesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, ShapeFilesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $shapeFile = ShapeFile::findOrFail($id);
            $shapeFile->update($data);

            return redirect()->route('admin.shape_file.index')
                             ->with('success_message', trans('shape_files.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('shape_files.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified shape file from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $shapeFile = ShapeFile::findOrFail($id);
            $shapeFile->delete();

            return redirect()->route('admin.shape_file.index')
                             ->with('success_message', trans('shape_files.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('shape_files.unexpected_error')]);
        }
    }



}