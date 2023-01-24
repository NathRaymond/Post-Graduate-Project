<?php

namespace App\Http\Controllers;

use function App\Helpers\api_request_response;
use function App\Helpers\generate_random_password;
use function App\Helpers\generate_uuid;
use function App\Helpers\unauthorized_status_code;
use function App\Helpers\bad_response_status_code;
use function App\Helpers\success_status_code;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\Modules;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:role-create', ['only' => ['create']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['delete']]);
    }
    public function index()
    {

        $roles = Role::all();
        $data["roles"] = $roles;


        return view('admin.roles', $data)->with('i');
    }

    public function create(Request $request)
    {

        $input = $request->all();



        try {

            $data = Role::create($input);


            $success['data'] = $data;

            return api_request_response(
                "ok",
                "Data Update successful!",
                success_status_code(),
                $data
            );
        } catch (\Exception $exception) {
            // DB::rollback();

            return api_request_response(
                "error",
                $exception->getMessage(),
                bad_response_status_code()
            );
        }

        // $input = $request->all();

        // $role= Role::create($input);

        // $success['role'] =  $role;

        // return Redirect::back()->with(["success" => "New Role created successfully!"]);
    }

    public function update(Request $request)
    {
        $role = Role::where('id', $request->id)->first();
        $role->update([
            'description' => $request->description
        ]);
        return redirect()->route('roles_home')
            ->with(['success' => 'Role has been successfully Updated!.']);
    }


    public function getAccountBranchList()
    {

        $account['data']  = Role::orderBy('description')->get();


        return json_encode($account);
    }

    public  function delete(Request $request)
    {
        $id = $request->id;


        $role = Role::find($id);
        $role->delete(); //delete the client
        // User::where('id', '=', $id)->delete();
        return redirect()->back()->with('deleted', 'Delete Success!');
        //Session::flash('message','Delete successfully.');
    }

    public function getRolelist()
    {
        $role['data']  = Role::all();

        return json_encode($role);
    }
}
