<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($forget_pass)
    {
        $this->data = $forget_pass;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        $data = $this->data;
        $data['judul'] = 'Ubah Kata sandi anda Anda';
        $data['kata-kata'] = 'Silakan tekan tombol di bawah ini untuk melanjutkan proses penggantian kata sandi Anda.';
        $data['tautan'] = route('forget_password.edit', $data['id']);
        $data['tombol'] = 'Ubah Kata Sandi';
        $data['kata-penutup'] = 'Jika Anda tidak mengubah kata sandi Anda di Aplikasi Desa Kalurahan Sentolo, Anda dapat mengabaikan pesan ini.';

        return $this->view('bo.page.mail.mail')
                    ->with('data', $data)
                    ->subject('Ubah Kata Sandi');
    }
}
