<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\Authorisable;
use Exception;
use Yajra\Datatables\Datatables;
use App\Models\Organisation;




class UsersController extends Controller
{
   use Authorisable; //This is for checking permission of all actions


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
     * Display a listing of the users.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {

        $users = User::count();//paginate(25);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        //$roles = Role::pluck('name', 'id');
        $roles = Role::all();
        $organisations = Organisation::pluck('name','id')->all();
        $password_required = true;
        return view('admin.users.create',compact('roles','password_required','organisations'));
    }

    /**
     * Store a new user in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'bail|required|min:2',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'roles' => 'required|min:1'
            ]);

            // hash password
            $request->merge(['password' => bcrypt($request->get('password'))]);

            // Create the user
            if ( $user = User::create($request->except('roles', 'permissions')) ) {
                $this->syncPermissions($request, $user);
                //flash(trans('users.model_was_added'))->success();
               // return redirect()->route('admin.user.index');
               return redirect()->route('admin.user.index')
                  ->with('success_message', trans('users.model_was_added'));

            }
        } catch (Exception $exception) {
            //flash(trans('users.unexpected_error'))->error();
            //dd($exception);
            return back()->withInput()
            ->withErrors(['unexpected_error' => trans('users.unexpected_error')]);
            //return back()->withInput();

        }
    }

    /**
     * Display the specified user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($user)
    {
        $roles = Role::all();
        $permissions = Permission::all('name', 'id');
        $organisations = Organisation::pluck('name','id')->all();
        $password_required = false;
        return view('admin.users.edit', compact('user','roles','permissions','password_required','organisations'));
    }

   /**
    * This function is used to edit user roles
    */

    public function edit_role($user)
    {
      $login_user=User::findOrFail(Auth::Id());

        if($login_user->hasRole('Admin')){

          $roles = Role::all();
          $permissions = Permission::all('name', 'id');
          return view('admin.users.edit_role', compact('user','roles','permissions'));
        }
        else{
          $message = "You do not have permission  to access  this page!";
          return response(view('errors.403',compact('message')), 403);
        }
    }

    /**
     * Update the specified user in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($user, Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'bail|required|min:2',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'roles' => 'required|min:1'
            ]);

            // Update user
            $user->fill($request->except('roles', 'permissions', 'password')); //TODO: Fix update user without changing passoword
            //$user->fill($request->except('roles', 'permissions'));

            // check for password change
            if($request->get('password')) {
                $user->password = bcrypt($request->get('password'));
            }

            // Handle the user roles
            $this->syncPermissions($request, $user);

            $changes = $user->save();

            //flash(trans('users.model_was_added'))-success();
            return redirect()->route('admin.user.index')
            ->with('success_message', trans('users.model_was_updated'));
           //return redirect()->route('admin.user.index');


        } catch (Exception $exception) {
            //flash(trans('users.unexpected_error'))->error();
         
            return back()->withInput()
            ->withErrors(['unexpected_error' => trans('users.unexpected_error')]);
            //return back()->withInput();
        }
    }

    /**
     * Update the specified user in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update_role($user, Request $request)
    {
      $login_user=User::findOrFail(Auth::Id());

        if($login_user->hasRole('Admin'))
        {
           try {

                  $this->validate($request, [
                      'name' => 'bail|required|min:2',
                      'email' => 'required|email|unique:users,email,' . $user->id,
                      'roles' => 'required|min:1'
                  ]);


                  // Update user
                  //$user->fill($request->except('roles', 'permissions', 'password')); //TODO: Fix update user without changing passoword
                  $user->fill($request->except('roles', 'permissions'));

                  // Handle the user roles
                  $this->syncPermissions($request, $user);

                  $user->save();
                  //$user->update($data);
                  //flash(trans('users.model_was_updated'))->success();
                  return redirect()->route('admin.user.index')
                   ->with('success_message', trans('users.model_was_updated'));
                  //return redirect()->route('admin.user.index');


              } catch (Exception $exception) {

                  //flash(trans('users.unexpected_error'))->error();
                  return back()->withInput()
                    ->withErrors(['unexpected_error' => trans('users.unexpected_error')]);
                 // return back()->withInput();
              }
        } //TODO: Add else clause... to hand ubnormal  access tot he is resouces
    }

    /**
     * Remove the specified user from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($user)
    {
        try {
            if ( Auth::user()->id == $user->id ) {
              //flash(trans('users.self_delete'))->error();
                return back()->withInput();//user cant delete himself
            }
            else{
                //TODO Check If this user has to delete other users
                $user->delete();
                //flash(trans('users.model_was_updated'))->success();
                //return redirect()->route('admin.user.index');
                return redirect()->route('admin.user.index')
                  ->with('success_message', trans('users.model_was_deleted'));
            }
        } catch (Exception $exception) {

            //flash(trans('users.unexpected_error'))->error();
            return back()->withInput()
            ->withErrors(['unexpected_error' => trans('users.unexpected_error')]);
           // return back()->withInput();
        }
    }

    /**
     * Function for syncing the permissions
     */
    private function syncPermissions(Request $request, $user)
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if( ! $user->hasAllRoles( $roles ) ) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);
        return $user;
    }

    public function getData(Datatables $datatables)
    {

      $builder = User::select('users.*');
      return $datatables->eloquent($builder)
              ->addColumn('action', 'includes.partials.actions_users')
              ->rawColumns(['name', 'action'])
              ->make();
    }


}
