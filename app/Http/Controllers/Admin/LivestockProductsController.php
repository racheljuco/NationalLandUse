<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LivestockProductsFormRequest;
use App\Models\Livestock;
use App\Models\LivestockProduct;
use App\Models\LandUsePlan;
use App\Models\Village;

class LivestockProductsController extends Controller
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
     * Display a listing of the cultivated land yields.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $livestockProducts = LivestockProduct::with('landuseplan','village','livestock')->paginate(25);

        return view('admin.livestock_product.index', compact('livestockProducts'));
    }

    /**
     * Show the form for creating a new cultivated land yield.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
$Villages = Village::pluck('village_name','id')->all();
$Livestocks = Livestock::pluck('name','id')->all();
        
        return view('admin.livestock_product.create', compact('LandUsePlans','Villages','Livestocks'));
    }

    /**
     * Store a new cultivated land yield in the storage.
     *
     * @param App\Http\Requests\LivestockProductsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(LivestockProductsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            LivestockProduct::create($data);

            return redirect()->route('admin.livestock_product.index')
                             ->with('success_message', trans('livestock_products.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('livestock_products.unexpected_error')]);
        }
    }

    /**
     * Display the specified cultivated land yield.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $livestockProduct = LivestockProduct::with('landuseplan','village','livestock')->findOrFail($id);

        return view('admin.livestock_product.show', compact('livestockProduct'));
    }

    /**
     * Show the form for editing the specified cultivated land yield.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $livestockProduct = LivestockProduct::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Villages = Village::pluck('village_name','id')->all();
        $Livestocks = Livestock::pluck('name','id')->all();

        return view('admin.livestock_product.edit', compact('livestockProduct','LandUsePlans','Villages','Livestocks'));
    }

    /**
     * Update the specified cultivated land yield in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LivestockProductsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, LivestockProductsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            $livestockProduct = LivestockProduct::findOrFail($id);
            $livestockProduct->update($data);

            return redirect()->route('admin.livestock_product.index')
                             ->with('success_message', trans('livestock_products.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('livestock_products.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified cultivated land yield from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $livestockProduct = LivestockProduct::findOrFail($id);
            $livestockProduct->delete();

            return redirect()->route('admin.livestock_product.index')
                             ->with('success_message', trans('livestock_products.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('livestock_products.unexpected_error')]);
        }
    }



}