<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BuktiPendaftaran extends Mailable
{
    use Queueable, SerializesModels;

    public $nama; 
    public $npm;
    public $email;
    public $no_hp;
    public $umur;
    public $berat_badan;
    public $golongan_darah;
    public $hal;
    public $hari;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nama, $npm, $email, $no_hp, $umur, $berat_badan, $golongan_darah, $hal, $hari)
    {
        $this->nama = $nama;
        $this->npm = $npm;
        $this->email = $email;
        $this->no_hp = $no_hp;
        $this->umur = $umur;
        $this->berat_badan = $berat_badan;
        $this->golongan_darah = $golongan_darah;
        $this->hal = $hal;
        $this->hari = $hari;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                    -> subject("Bukti Pendaftaran Donor Darah")
                    -> markdown('emails.bukti_pendaftaran')
                    -> with([
                        'nama' => $this->nama,
                        'npm' => $this->npm,
                        'email' => $this->email,
                        'no_hp' => $this->no_hp,
                        'umur' => $this->umur,
                        'berat_badan' => $this->berat_badan,
                        'golongan_darah' => $this->golongan_darah,
                        'hal' => $this->hal,
                        'hari' => $this->hari,
                    ]);
    }
}
