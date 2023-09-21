<?php

namespace App\Http\Controllers\bo\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ForgetPasswordUser;
use App\Mail\ForgetPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bo.page.login.forget');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);
        $forget_pass['email'] =  $request->email;

        $user = User::where('email', $forget_pass['email'])->first();
        if($user == null){
             return back()->with('error', config('error','email tidak ditemukan')); 
        }

        $passmail = ForgetPasswordUser::where('email', $forget_pass['email'])->first();
        if($passmail == null)
        {
            $forget_pass['id'] = date('Ymdhis').'-'.substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 75);
            ForgetPasswordUser::create($forget_pass);
        }
        else
        {
            $forget_pass['id'] = $passmail->id;
        }
        Mail::to($forget_pass['email'])->send(new ForgetPassword($forget_pass));

        return back()->with('success', config('success','Silahkan cek email anda')); 

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
        ForgetPasswordUser::findOrFail($id);
        return view('bo.page.login.forget_confirm', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $record = $request->validate([
            'password' => 'required|min:6|same:confirm-password'
        ]);

        $passmail = ForgetPasswordUser::findOrFail($id);

        $user = User::where('email', $passmail->email)->first();
        if($user == null){
             return back()->with('error', config('error','token invalid')); 
        }

        $record['password'] = Hash::make($record['password']);
        $user->update($record);
        $passmail->delete();

        return redirect()->route('login')->with('success', config('success','Anda berhasil mengganti password anda'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
