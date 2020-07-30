<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrganisationsFormRequest;
use App\Models\Organisation;
use App\Models\OrganisationType;

class OrganisationsController extends Controller
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
     * Display a listing of the organisations.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $organisations = Organisation::with('organisationtype')->paginate(25);

        return view('admin.organisations.index', compact('organisations'));
    }

    /**
     * Show the form for creating a new organisation.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $OrganisationTypes = OrganisationType::pluck('id','id')->all();
        
        return view('admin.organisations.create', compact('OrganisationTypes'));
    }

    /**
     * Store a new organisation in the storage.
     *
     * @param App\Http\Requests\OrganisationsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(OrganisationsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Organisation::create($data);

            return redirect()->route('admin.organisation.index')
                             ->with('success_message', trans('organisations.model_was_added'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('organisations.unexpected_error')]);
        }
    }

    /**
     * Display the specified organisation.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $organisation = Organisation::with('organisationtype')->findOrFail($id);

        return view('admin.organisations.show', compact('organisation'));
    }

    /**
     * Show the form for editing the specified organisation.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $organisation = Organisation::findOrFail($id);
        $OrganisationTypes = OrganisationType::pluck('id','id')->all();

        return view('admin.organisations.edit', compact('organisation','OrganisationTypes'));
    }

    /**
     * Update the specified organisation in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\OrganisationsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, OrganisationsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $organisation = Organisation::findOrFail($id);
            $organisation->update($data);

            return redirect()->route('admin.organisation.index')
                             ->with('success_message', trans('organisations.model_was_updated'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('organisations.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified organisation from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $organisation = Organisation::findOrFail($id);
            $organisation->delete();

            return redirect()->route('admin.organisation.index')
                             ->with('success_message', trans('organisations.model_was_deleted'));

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('organisations.unexpected_error')]);
        }
    }



}