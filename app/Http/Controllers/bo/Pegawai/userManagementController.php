<?php

namespace App\Http\Controllers\bo\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
// use DataTables;

class userManagementController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:user_list|user_create|user_edit|user_delete'], ['only' => ['index', 'store']]);
        $this->middleware(['permission:user_create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:user_edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:user_delete'], ['only' => ['destroy']]);
        $this->data['title'] = 'Pegawai';
        $this->data['dropdown1'] = null;
        $this->data['dropdown2'] = null;
        $this->data['view'] = 'bo.page.pegawai.user';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->data;
        $data['users'] = User::get();
        return view($data['view'].'.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->data;
        $data['roles'] = Role::pluck('name','name')->all();
        $data['url'] = route('bo.pegawai.user_management.store');
        return view($data['view'].'.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        // $input['jabatan'] = $input['roles'];
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('bo.pegawai.user_management.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->data;
        $data['user'] = User::find($id);
        $data['roles'] = Role::pluck('name','name')->all();
        $data['userRole'] = $data['user']->roles->pluck('name','name')->all();
        $data['url'] = route('bo.pegawai.user_management.update', $id);

        return view($data['view'].'.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'username' => ['required', Rule::unique('users', 'username')->ignore($id)],
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('bo.pegawai.user_management.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('bo.pegawai.user_management.index')
                        ->with('success','User deleted successfully');
    }
}
