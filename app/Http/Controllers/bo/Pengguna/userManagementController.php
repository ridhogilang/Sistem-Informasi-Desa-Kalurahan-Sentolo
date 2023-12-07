<?php

namespace App\Http\Controllers\bo\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerifyMail as VerifyMailModel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\Datatables;
use App\Models\Penduduk;
// use DataTables;

class userManagementController extends Controller
{
    function __construct()
    {
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
        // $data['users'] = User::where("is_delete","<>", '1')->get();
        return view($data['view'].'.index', $data);
    }

    public function datas()
    {
        $data = User::where("is_delete","<>", '1')->where("is_pamong","=", "1")->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    if($row["is_active"] == 1){
                        $aktiv = '<button class="btn btn-success mx-1" type="submit"><i class="bi bi-toggle2-on"></i></button>';
                    }else{
                        $aktiv = '<button class="btn btn-secondary mx-1" type="submit"><i class="bi bi-toggle2-off"></i></button>';
                    }
                    $actionBtn = '
                    <div class="d-flex">
                    <form action="'. route('bo.pengguna.data.aktiv', $row["id"]).'">
                        ' . csrf_field() . '
                        '.$aktiv.'
                    </form>
                    <form action="'. route('bo.pegawai.user_management.destroy', $row["id"]) .'" method="POST"> 
                                ' . csrf_field() . '
                                ' . method_field("DELETE") . '
                                <a class="btn btn-warning" href="'. route('bo.pegawai.user_management.edit', $row["id"]) .'">
                                <i class="fa-solid fa-pen-to-square"></i></a>
                                <button class="btn btn-danger" type="submit" href="/surat-kbm/'.$row["id"].'/delete"><i class="fa-regular fa-trash-can"></i></button>
                                 </form>
                    </div>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function aktivv(string $id)
    {
        $user = User::find($id);
        if($user->is_active == 0){
            $user->update(['is_active' => '1']);
        }
        else{
            $user->update(['is_active' => '0']);
        }
        return redirect()->route('bo.pegawai.user_management.index')
                        ->with('success','User updated successfully');
    }
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
            'nik' => 'required',
            'email' => 'required|email|unique:users,email|unique:verify_mails,email',
            'password' => 'required|min:6|same:confirm-password',
            'roles' => 'nullable',
            'is_pamong' => 'required',
        ]);

        $input = $request->all();
        $input['nama'] = Penduduk::where('nik', '=', $input['nik'])->first()->nama;
        $input['jabatan'] = isset($input['roles']) ? $input['roles'] : null; 
        if(!isset($input['jabatan'])){
            $input['is_pamong'] = '0';
        }
        // tambahan input
        $input['password'] = Hash::make($input['password']);
        $input['is_active'] = '1';
        $input['is_delete'] = '0';

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        //proses membuat verify email
        $verimail['id'] = date('Ymdhis').'-'.substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 75);
        $verimail['email'] =  $input['email'];
        VerifyMailModel::create($verimail);
        Mail::to($verimail['email'])->send(new VerifyMail($verimail));

        //redirect
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
            'nik' => 'required',
            'email' => 'required|email|unique:users,email|unique:verify_mails,email',
            'password' => 'required|min:6|same:confirm-password',
            'roles' => 'nullable',
            'is_pamong' => 'required',
        ]);

        $input = $request->all();
        $input['nama'] = Penduduk::where('nik', '=', $input['nik'])->first()->nama;
        $input['jabatan'] = isset($input['roles']) ? $input['roles'] : null; 
        if(!isset($input['jabatan'])){
            $input['is_pamong'] = '0';
        }
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);

        if($input['email'] != $user->email){
            
            $verify_old = VerifyMailModel::where('email', $user->email)->first();
            if($verify_old != null){
               $verify_old->delete();  
            }

            $input['email_verified_at'] = null;

            $verimail['id'] = date('Ymdhis').'-'.substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 75);
            $verimail['email'] =  $input['email'];
            VerifyMailModel::create($verimail);
            Mail::to($verimail['email'])->send(new VerifyMail($verimail));
        }

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
        $user = User::find($id);
        if($user->is_active == 0){
            $user->delete();
        }
        else{
            return redirect()->route('bo.pegawai.user_management.index')
                        ->with('warning','Gagal Menghapus Pengguna');
        }
        return redirect()->route('bo.pegawai.user_management.index')
                        ->with('success','Berhasil Menghapus Pengguna');
    }
}
