<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use function App\Helpers\api_request_response;
use function App\Helpers\generate_random_password;
use function App\Helpers\generate_uuid;
use function App\Helpers\unauthorized_status_code;
use function App\Helpers\bad_response_status_code;
use function App\Helpers\success_status_code;
use App\Models\SavePermission;

class RolesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
       
                $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $roles = Role::all();
        $data["roles"] = $roles;


        return view('admin.role.index', $data)->with('i');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('admin.roles.create', compact('permission'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);



       DB::beginTransaction();
    try{
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        DB::commit();
        return $request->wantsJson()
        ? response()->json(["data" => $role, "message" => "Role created successfully"])
        : redirect()->route('roles_home')->with("message", "Role created successfully");
    } catch (\Exception $e) {
            DB::rollback();
        return $request->wantsJson()
        ? response()->json(["message" => $e->getMessage()], 400)
        : redirect()->back()->withInput()->withErrors([$e->getMessage()]);
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();
        return view('admin.roles.show', compact('role', 'rolePermissions'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('admin.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);


       DB::beginTransaction();
        try{

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        DB::commit();
        return $request->wantsJson()
        ? response()->json(["data" => $role, "message" => "Role updated successfully"])
        : redirect()->route('roles_home')->with("message", "Role updated successfully");

        } catch (\Exception $e) {
            DB::rollback();
        return $request->wantsJson()
        ? response()->json(["message" => $e->getMessage()], 400)
        : redirect()->back()->withInput()->withErrors([$e->getMessage()]);
         }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getAccountBranchList()
    {

        $account['data']  = Role::orderBy('description')->get();


        return json_encode($account);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
      $deleteROle=   DB::table("roles")->where('id', $id)->delete();
        return $request->wantsJson()
        ? response()->json(["data" => $deleteROle, "message" => "Role deleted successfully"])
        : redirect()->back()->with("message", "Role deleted successfully");

    }

    public function getRolelist()
    {
        $role['data']  = Role::all();

        return json_encode($role);
    }
    
    
    public function create_permission(Request $request){

        try{

            $input = $request->all();
            // dd($input);
            $input['guard_name']= 'web';

            if ($this->user = SavePermission::where('name', $request->name)->first()) {
                throw new \Exception('This permission already exists!');
            }

            $saveInput = SavePermission::create($input);


            return api_request_response(
                'ok',
                'Data Update successful!',
                success_status_code(),
                $saveInput
            );

            } catch (\Exception $exception) {
            // ( $exception->getMessage() );
            return api_request_response(
                'error',
                $exception->getMessage(),
                bad_response_status_code()
            );
        }
    }
}
