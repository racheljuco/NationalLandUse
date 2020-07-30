<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\RolesFormRequest;
use Exception;
use App\Traits\Authorisable;
use Yajra\Datatables\Datatables;



class RolesController extends Controller
{
    use Authorisable;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
	public function __construct()
	{
        $this->middleware(['auth']);
	}

    /**
     * Display a listing of the roles.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {


        $roles = Role::count();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create',compact('permissions'));
    }

    /**
     * Store a new role in the storage.
     *
     * @param App\Http\Requests\RolesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(RolesFormRequest $request)
    {
        try {

            $data = $request->getData();
          // dd($data);
            //permissions array ids
            $permissions = $data['permissions'];


            if($role = Role::create($data)){

                $role->syncPermissions($permissions);
                //flash(trans('roles.model_was_updated'))->success();
                return redirect()->route('admin.role.index')
                ->with('success_message', trans('roles.model_was_added'));
               // return redirect()->route('admin.role.index');
            }
            else{

                //flash(trans('roles.unexpected_error'))->error();
                return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('roles.unexpected_error')]);
            }

        } catch (Exception $exception) {

            //flash(trans('roles.unexpected_error'))->error();
            return back()->withInput()
                         ->withErrors(['unexpected_error' => trans('roles.unexpected_error')]);
            //return back()->withInput();
        }
    }

    /**
     * Display the specified role.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($role)
    {

        $permissions = Permission::all();

        return view('admin.roles.show', compact('role','permissions'));
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($role)
    {

        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role','permissions'));
    }

    /**
     * Update the specified role in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\RolesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($role, RolesFormRequest $request)
    {
        try {

            $data = $request->getData();
            $permissions = $data['permissions'];

            if($role){
                //update role
                $role->update($data);
                // admin role has everything
                if($role->name === 'Admin') {
                    //$role->syncPermissions(Permission::all());
                    $role->syncPermissions($permissions);
                    //flash(trans('roles.model_was_updated'))->success();
                    return redirect()->route('admin.role.index')
                    ->with('success_message', trans('roles.model_was_updated'));
                   // return redirect()->route('admin.role.index');


                }

                $role->syncPermissions($permissions);
                //flash(trans('roles.model_was_updated'))->success();
                //return redirect()->route('admin.role.index');
                return redirect()->route('admin.role.index')
                ->with('success_message', trans('roles.model_was_updated'));

            }


        } catch (Exception $exception) {

            //flash(trans('roles.unexpected_error'))->error();
            return back()->withInput()
            ->withErrors(['unexpected_error' => trans('roles.unexpected_error')]);
            //return back()->withInput();

        }
    }

    /**
     * Remove the specified role from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($role)
    {
        //TODO: Only deletes the roles, but not the permissions associated with the roles.
        try {
            $role->delete();

            //flash(trans('roles.model_was_deleted'))->success();
            return redirect()->route('admin.role.index');

        } catch (Exception $exception) {

            //flash(trans('roles.unexpected_error'))->error();
            return back()->withInput();

        }
    }

    public function getData(Datatables $datatables)
    {
      $builder = Role::select('roles.*');
      return $datatables->eloquent($builder)
              ->addColumn('action', 'includes.partials.actions_roles')
              ->rawColumns(['name', 'action'])
              ->make();
    }


}
