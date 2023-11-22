<?php

namespace App\Http\Controllers\bo\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\User;
use App\Models\VerifyMail as VerifyMailModel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\Datatables;

class AkunPendudukController extends Controller
{
    function __construct()
    {
        $this->data['title'] = 'Pegawai';
        $this->data['dropdown1'] = null;
        $this->data['dropdown2'] = null;
        $this->data['view'] = 'bo.page.pengguna.akun_penduduk';
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
        $data = User::where("is_delete","<>", '1')->where("jabatan","=", null)->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '
                    <form action="'. route('bo.pengguna.akun_penduduk_management.destroy', $row["id"]) .'" method="POST"> 
                                ' . csrf_field() . '
                                ' . method_field("DELETE") . '
                                <button class="btn btn-danger" type="submit" href="/surat-kbm/'.$row["id"].'/delete"><i class="fa-regular fa-trash-can"></i></button>
                                 </form>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function penduduk(Request $request)
    {
        $searchTerm = $request->input('q');

        $datas  = Penduduk::select('nik', 'nama')
                    ->where('nama', 'like', "%$searchTerm%")
                    ->orwhere('nik', 'like', "%$searchTerm%")
                    ->where('is_active', '=', '1')
                    ->get();

         return DataTables::of($datas)
            ->addColumn('select_display', function ($data) {
                return $data->nik . ' - ' . $data->nama;
            })
            ->addColumn('select_value', function ($data) {
                return $data->nik;
            })
            ->rawColumns(['select_display', 'select_value'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->data;
        $data['url'] = route('bo.pengguna.akun_penduduk_management.store');
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
        ]);

        $input = $request->all();
        // tambahan input
        $input['nama'] = Penduduk::where('nik', '=', $input['nik'])->first()->nama;
        $input['password'] = Hash::make($input['password']);
        $input['is_active'] = '1';
        $input['is_delete'] = '0';

        //proses membuat verify email
        $verimail['id'] = date('Ymdhis').'-'.substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 75);
        $verimail['email'] =  $input['email'];
        
        $user = User::create($input);
        VerifyMailModel::create($verimail);
        Mail::to($verimail['email'])->send(new VerifyMail($verimail));

        //redirect
        return redirect()->route('bo.pengguna.akun_penduduk_management.index')
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
        if($data['user']->jabatan != null)
        {
             return redirect()->route('bo.pegawai.user_management.edit', $id);
        }
        $data['url'] = route('bo.pengguna.akun_penduduk_management.update', $id);

        return view($data['view'].'.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        

        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|min:6|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['jabatan'] = $input['roles']; 
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

        return redirect()->route('bo.pengguna.akun_penduduk_management.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $input['is_delete'] = '1';
        User::find($id)->update($input);
        return redirect()->route('bo.pengguna.akun_penduduk_management.index')
                        ->with('success','User deleted successfully');
    }
}
