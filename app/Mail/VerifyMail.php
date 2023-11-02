<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($verimail)
    {
        $this->data = $verimail;
    }

    public function build()
    {
        $data = $this->data;
        $data['judul'] = 'Konfirmasi Alamat Email Anda';
        $data['kata-kata'] = 'Terima kasih telah mendaftar di Aplikasi Desa Kalurahan Sentolo. Untuk menyelesaikan proses pendaftaran, silakan konfirmasikan alamat email Anda dengan mengklik tautan di bawah ini:';
        $data['tautan'] = url('/sitemin-sentolo/verifymail/'.$data['id']);
        $data['tombol'] = 'Konfirmasi Email';
        $data['kata-penutup'] = 'Jika Anda tidak mendaftar di Aplikasi Desa Kalurahan Sentolo, Anda dapat mengabaikan pesan ini.';
        
        return $this->view('bo.page.mail.mail')
                    ->with('data', $data)
                    ->subject('Verifikasi Email');
    }
}
