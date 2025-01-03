<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class BroadcastEmail extends Mailable
{
    public $judul;
    public $tanggal;
    public $isi;

    public function __construct($judul, $tanggal, $isi)
    {
        $this->judul = $judul;
        $this->tanggal = $tanggal;
        $this->isi = $isi;
    }

    public function build()
    {
        return $this->subject($this->judul)
                    ->view('emails.broadcast'); // Pastikan nama view sesuai
    }
}
