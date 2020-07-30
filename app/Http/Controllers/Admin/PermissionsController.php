<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionsFormRequest;
use App\Traits\Authorisable;
use Exception;
use Yajra\Datatables\Datatables;

class PermissionsController extends Controller
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
     * Display a listing of the permissions.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $permissions = Permission::count();//paginate(25);

        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new permission.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $this->generate_permissions();
        // flash(trans('permissions.model_was_added'))->success();
        return redirect()->route('admin.permission.index');

    }

    /**
     * Store a new permission in the storage.
     *
     * @param App\Http\Requests\PermissionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(PermissionsFormRequest $request)
    {
        try {

            $data = $request->getData();

            Permission::create($data);
            // flash(trans('permissions.model_was_added'))->success();
            return redirect()->route('admin.permission.index');

        } catch (Exception $exception) {
            flash(trans('permissions.unexpected_error'))->error();
            return back()->withInput();
        }
    }

    /**
     * Display the specified permission.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($permission)
    {
        return view('admin.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified permission.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($permission)
    {

        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified permission in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\PermissionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($permission, PermissionsFormRequest $request)
    {
        try {

            $data = $request->getData();
            $permission->update($data);

            // flash(trans('permissions.model_was_updated'))->success();
            return redirect()->route('admin.permission.index');

        } catch (Exception $exception) {

            flash(trans('permissions.unexpected_error'))->error();
            return back()->withInput();
        }
    }

    /**
     * Remove the specified permission from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($permission)
    {
        try {
            $permission->delete();

            // flash(trans('permissions.model_was_deleted'))->success();
            return redirect()->route('admin.permission.index');


        } catch (Exception $exception) {
          
            // flash(trans('permissions.unexpected_error'))->error();
            return back()->withInput();

        }
    }

    /**
     * This function generates permissions automatically from the models folder
     */
    private function generate_permissions(){
        //TODO: Improve this function to be able to assign Admin all permission automatically
        $path = app_path().'/Models';
        $files = scandir($path);

        /*$models = array();
        $namespace = 'Your\Model\Namespace\\';*/
        foreach($files as $file) {
          //skip current and parent folder entries and non-php files
          if ($file == '.' || $file == '..') continue;
          $models[] = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file);//$file; //$namespace . preg_replace('\.php$', '', $file);
        }
      //$users = User::whereHas('roles',function($q){$q->where('name', 'admin');})->get(); //get users with admin roles


        $ps = ['view','add','edit','delete'];
       // $role = Role::firstOrFail(['Admin'=>'name']);
       // $role = Role::findOrFail(1);
       // dd($role);
        foreach($models as $mod){
            foreach($ps as $p){
                $perm = Permission::firstOrNew(
                    ['name' => $p.'_'.strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $mod))], ['guard_name' => 'web']);
                $perm->save();
                //$perm->assignRole('Admin');
                //strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $mod))  -> this is for changing modDule to mod_dule
            }
        }

        //give all permissions to admin
        //$role->syncPermissions(Permission::all());


    }


    public function getData(Datatables $datatables)
    {

      $builder = Permission::select('permissions.*');
      return $datatables->eloquent($builder)
              ->addColumn('action', 'includes.partials.actions_permissions')
              ->rawColumns(['name', 'action'])
              ->make();
    }



}
