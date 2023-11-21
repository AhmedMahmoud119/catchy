<?php


namespace App\Http\Controllers;


use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DB;


class AdminsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:admin-list|admin-create|admin-edit|admin-delete', ['only' => ['index','store']]);
        $this->middleware('permission:admin-create', ['only' => ['create','store']]);
        $this->middleware('permission:admin-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:admin-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $admins = Admin::orderBy('id', 'desc')->paginate(50);

        return view('admin.admins.index', compact('admins'));
    }

    public function create(Request $request)
    {
        $roles = Role::get();

        return view('admin.admins.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $admin = Admin::create($request->all() + [
                'password' => bcrypt($request->password),
            ]);
        $admin->assignRole([$request->role_id]);

        return redirect()->route('admin.admins.index')->with([
            'success' => 'added successfully',
        ]);
    }

    public function edit(Admin $admin,Request $request)
    {
        $roles = Role::get();

        return view('admin.admins.edit', compact('admin','roles'));
    }

    public function update(Admin $admin,Request $request)
    {
        $admin->update($request->except('password'));

        if ($request->password) {
            $admin->update([
                'password' => bcrypt($request->password),
            ]);
        }

        $admin->roles()->sync([$request->role_id]);

        return redirect()->route('admin.admins.index')->with([
            'success' => 'added successfully',
        ]);
    }

    public function destroy($id)
    {
        if (auth('admin')->user()->id == $id) {
            return redirect()->route('admin.admins.index')
                ->with('error','Admin cant deleted');
        }

        Admin::find($id)->delete();
        return redirect()->route('admin.admins.index')
            ->with('success','Admin deleted successfully');
    }

}
