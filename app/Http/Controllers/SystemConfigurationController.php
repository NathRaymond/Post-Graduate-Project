<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function App\Helpers\api_request_response;
use function App\Helpers\generate_random_password;
use function App\Helpers\generate_uuid;
use function App\Helpers\unauthorized_status_code;
use function App\Helpers\success_status_code;
use function App\Helpers\bad_response_status_code;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Response;
use App\System_Configuration;

class SystemConfigurationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:role-list', ['only' => ['index']]);
        $this->middleware('permission:role-create', ['only' => ['add_new_tama']]);
    }

    public function index()
    {

        $configurations = System_Configuration::all();
        $data["configurations"] = $configurations;
        return view('admin.system_configuration', $data);
    }
}
