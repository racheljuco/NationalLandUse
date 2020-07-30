<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiaryKeepersFormRequest;
use App\Models\Livestock;
use App\Models\DiaryKeeper;
use App\Models\LandUsePlan;
use App\Models\Village;

class DiaryKeepersController extends Controller
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
     * Display a listing of the Livestocks.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $diaryKeepers = DiaryKeeper::with('landuseplan','village','livestock')->paginate(25);

        return view('admin.diary_keeper.index', compact('diaryKeepers'));
    }

    /**
     * Show the form for creating a new Livestock.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Villages = Village::pluck('village_name','id')->all();
        $Livestocks = Livestock::pluck('name','id')->all();
        
        return view('admin.diary_keeper.create', compact('LandUsePlans','Villages','Livestocks'));
    }

    /**
     * Store a new Livestock in the storage.
     *
     * @param App\Http\Requests\DiaryKeepersFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(DiaryKeepersFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            DiaryKeeper::create($data);

            return redirect()->route('admin.diary_keeper.index')
                             ->with('success_message', trans('diary_keepers.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('diary_keepers.unexpected_error')]);
        }
    }

    /**
     * Display the specified Livestock.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $diaryKeeper = DiaryKeeper::with('landuseplan','village','livestock')->findOrFail($id);

        return view('admin.diary_keeper.show', compact('diaryKeeper'));
    }

    /**
     * Show the form for editing the specified Livestock.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $diaryKeeper = DiaryKeeper::findOrFail($id);
        $LandUsePlans = LandUsePlan::pluck('name','id')->all();
        $Villages = Village::pluck('village_name','id')->all();
        $Livestocks = Livestock::pluck('name','id')->all();

        return view('admin.diary_keeper.edit', compact('diaryKeeper','LandUsePlans','Villages','Livestocks'));
    }

    /**
     * Update the specified Livestock in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\LivestoctProjectionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, DiaryKeepersFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $village_id =  LandUsePlan::find($data['land_use_plan_id'])->village_id;
            $data['village_id'] = $village_id;
            $diaryKeeper = DiaryKeeper::findOrFail($id);
            $diaryKeeper->update($data);

            return redirect()->route('admin.diary_keeper.index')
                             ->with('success_message', trans('diary_keepers.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('diary_keepers.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified Livestock from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $diaryKeeper = DiaryKeeper::findOrFail($id);
            $diaryKeeper->delete();

            return redirect()->route('admin.diary_keeper.index')
                             ->with('success_message', trans('diary_keepers.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('diary_keepers.unexpected_error')]);
        }
    }



}