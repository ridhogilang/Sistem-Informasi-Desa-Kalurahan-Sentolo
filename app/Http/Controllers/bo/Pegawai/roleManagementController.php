<?php

namespace App\Http\Controllers\bo\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class roleManagementController extends Controller
{
    function __construct()
    {
        $this->data['title'] = 'Role';
        $this->data['dropdown1'] = null;
        $this->data['dropdown2'] = null;
        $this->data['view'] = 'bo.page.pegawai.role';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('role_list') == false) {
        return redirect()->route('bo.pegawai.dashboard');
        }

        $data = $this->data;
        $data['roles'] = Role::orderBy('id', 'DESC')->get();
        return view($data['view'].'.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->can('role_create') == false) {
        return redirect()->route('bo.pegawai.dashboard');
        }

        $data = $this->data;
        $data['permission'] = Permission::get();
        return view($data['view'].'.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->can('role_create') == false) {
        return redirect()->route('bo.pegawai.dashboard');
        }

        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('bo.pegawai.role_management.index')
            ->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $role = Role::find($id);
        // $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
        //     ->where("role_has_permissions.role_id", $id)
        //     ->get();

        // return view('roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (auth()->user()->can('role_edit') == false) {
        return redirect()->route('bo.pegawai.dashboard');
        }

        $data = $this->data;
        $data['role'] = Role::find($id);
        $data['permission'] = Permission::get();
        $data['rolePermissions'] = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view($data['view'].'.form_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (auth()->user()->can('role_edit') == false) {
        return redirect()->route('bo.pegawai.dashboard');
        }

        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('bo.pegawai.role_management.index')
            ->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->can('role_delete') == false) {
        return redirect()->route('bo.pegawai.dashboard');
        }

        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('bo.pegawai.role_management.index')
            ->with('success', 'Role deleted successfully');
    }
}
