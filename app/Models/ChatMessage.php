<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    public function clearChat(Request $request, $submateri)
    {
        // Menghapus semua chat milik siswa yang sedang login di submateri ini
        \App\Models\ChatMessage::where('user_id', session('user_id'))
                               ->where('submateri', $submateri)
                               ->delete();

        return response()->json(['status' => 'success', 'message' => 'Chat berhasil di-reset!']);
    }
}
