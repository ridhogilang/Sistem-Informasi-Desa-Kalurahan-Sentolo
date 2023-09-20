<?php

namespace App\Http\Controllers\bo\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VerifyMail;

class VerifikasiEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data['confirm_str'] = date('Ymdhis').'-'.substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 75);
        // Mail::to('zetooan@gmail.com')
        // ->send(new VerifyMail($data));
        // return view('bo.page.mail.mail', compact('data'));
    }


    public function mailverify(string $id)
    {
        $VerifyMail = VerifyMail::find($id);
        if($VerifyMail == null){
            $data['caption'] = 'Token yang anda gunakan untuk verifikasi email sudah kadaluarsa';
            return view('bo.page.mail.verifymail', $data);
        }

        $email = $VerifyMail->email;
        $user = User::where('email', $email)->first();
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();

        VerifyMail::find($id)->delete();
        $data['caption'] = 'Terima kasih telah melakukan verifikasi email klik tombol dibawah untuk melanjutkan login';
        return view('bo.page.mail.verifymail', $data);
    }
  
}
