<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BroadcastEmail;

class BroadcastController extends Controller
{
    // Fungsi untuk menampilkan form
    public function index()
    {
        // Mengambil semua subscriber untuk ditampilkan di form
        $subscribers = Subscriber::all();
        return view('broadcast', compact('subscribers')); // Pastikan nama view sesuai
    }

    // Fungsi untuk mengirimkan email
    public function send(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date_format:d/m/Y',
            'isi' => 'required|string',
            'target' => 'required|string',
        ]);

        $target = $request->input('target');
        $judul = $request->input('judul');
        $tanggal = $request->input('tanggal');
        $isi = $request->input('isi');

        // Tentukan email yang akan dikirim berdasarkan target
        if ($target == 'selected') {
            $emails = $request->input('emails'); // Mengambil email yang dipilih
        } else {
            // Jika 'Semua Pengguna' dipilih, ambil semua email dari database
            $emails = Subscriber::pluck('email')->toArray();
        }

        // Kirim email ke setiap email yang dipilih
        foreach ($emails as $email) {
            Mail::to($email)->send(new BroadcastEmail($judul, $tanggal, $isi));
        }

        return redirect()->route('broadcast.create')->with('success', 'Pesan broadcast berhasil dikirim!');
    }
}
