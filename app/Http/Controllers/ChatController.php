<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ChatController extends Controller
{
    /**
     * Menampilkan halaman chat.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('chat.index',['tittle'=>"Konsultasi"]);
    }

    /**
     * Mendapatkan daftar kontak untuk chat.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getContacts()
    {
        $role = auth()->user()->role;

        // Mendapatkan daftar kontak pengguna yang tersedia untuk chat
        if ($role === 'psikolog') {
            $contacts = User::where('role', 'pasien')->get();
        } else if ($role === 'pasien') {
            $contacts = User::where('role', 'psikolog')->get();
        } else {
            $contacts = [];
        }

        // Mengirim respons dalam format JSON dengan daftar kontak yang ditemukan
        return response()->json(['contacts' => $contacts]);
    }


    public function getSenderName($senderId)
    {
        // Mendapatkan nama pengirim dari tabel User berdasarkan sender_id
        $sender = User::find($senderId);
        $name = $sender ? $sender->name : '';

        // Mengirim respons dalam format JSON dengan nama pengirim yang ditemukan
        return response()->json(['name' => $name]);
    }
}
