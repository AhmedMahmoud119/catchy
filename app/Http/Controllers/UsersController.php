<?php


namespace App\Http\Controllers;


use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;


class UsersController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list', ['only' => ['index']]);
    }
    public function index(Request $request)
    {
        $customers = Customer::orderBy('customer_id','desc')->paginate(50);

        return view('admin.users.index',compact('customers'));

    }

}
