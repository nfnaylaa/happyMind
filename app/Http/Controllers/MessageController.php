<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Mendapatkan pesan dari kontak tertentu.
     *
     * @param  int  $receiverId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMessages($receiverId)
    {
        // Mendapatkan pesan-pesan dari database berdasarkan pengirim dan penerima
        $messages = Message::where(function ($query) use ($receiverId) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($receiverId) {
            $query->where('sender_id', $receiverId)
                ->where('receiver_id', auth()->id());
        })->orderBy('created_at', 'asc')->get();

        $sender = User::find(auth()->id());
    $senderName = $sender ? $sender->name : '';

    // Mengirim respons dalam format JSON dengan pesan-pesan yang ditemukan dan nama sender
    return response()->json([
        'messages' => $messages,
        'sender_name' => $senderName,
    ]);
    }

    /**
     * Mengirim pesan baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendMessage(Request $request)
    {
        // Validasi input
        $request->validate([
            'receiver_id' => 'required|integer',
            'content' => 'required|string',
        ]);

        // Simpan pesan baru ke dalam database
        $message = new Message();
        $message->sender_id = auth()->id();
        $message->receiver_id = $request->input('receiver_id');
        $message->content = $request->input('content');
        $message->save();

        // Mengirim respons dalam format JSON dengan pesan yang baru ditambahkan
        return response()->json([
        'message' => $message,

        // Mengirim respons dalam format JSON dengan pesan yang baru ditambahkan
        ]);
    }
}
