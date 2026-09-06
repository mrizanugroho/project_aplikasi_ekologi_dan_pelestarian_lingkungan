<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    // Bantuan untuk ambil data user yg lagi login
    private function getCurrentUser()
    {
        return DB::table('users')->where('id', session('user_id'))->first();
    }

    // 1. Ambil Pesan (Khusus Kelompok Sendiri)
    public function getMessages($submateri)
    {
        $user = $this->getCurrentUser();
        if (!$user) return response()->json([]);

        $messages = DB::table('chat_messages')
            ->join('users', 'chat_messages.user_id', '=', 'users.id')
            ->where('chat_messages.submateri', $submateri)
            ->where('chat_messages.kelompok_id', $user->kelompok_id) // 👈 KUNCI ISOLASINYA DI SINI
            ->orderBy('chat_messages.created_at', 'asc')
            ->select('chat_messages.*', 'users.nama_lengkap as nama_user')
            ->get();

        $formatted = $messages->map(function($msg) use ($user) {
            return [
                'id' => $msg->id,
                'text' => $msg->message,
                'sender' => $msg->nama_user,
                'is_me' => $msg->user_id == $user->id,
                'time' => \Carbon\Carbon::parse($msg->created_at)->format('H:i')
            ];
        });

        return response()->json($formatted);
    }

    // 2. Simpan Pesan Baru (Ditandai ID Kelompoknya)
    public function sendMessage(Request $request, $submateri)
    {
        $user = $this->getCurrentUser();

        DB::table('chat_messages')->insert([
            'user_id' => $user->id,
            'submateri' => $submateri,
            'kelompok_id' => $user->kelompok_id, // 👈 SIMPAN ID KELOMPOK KE PESAN
            'message' => $request->message,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json(['status' => 'success']);
    }

    // 3. Laporan Online Presence
    public function pingOnline($submateri)
    {
        $user = $this->getCurrentUser();
        if (!$user) return response()->json(['status' => 'error']);

        DB::table('chat_presences')->updateOrInsert(
            ['user_id' => $user->id, 'submateri' => $submateri],
            [
                'kelompok_id' => $user->kelompok_id, // 👈 SIMPAN ID KELOMPOK
                'last_active' => now()
            ]
        );

        return response()->json(['status' => 'success']);
    }

    // 4. Ambil User Online (Khusus Teman Sekelompok Saja)
    public function getOnlineUsers($submateri)
    {
        $user = $this->getCurrentUser();
        if (!$user) return response()->json(['online_users' => []]);

        $waktuBatas = now()->subMinutes(1);

        $onlineUsers = DB::table('chat_presences')
            ->join('users', 'chat_presences.user_id', '=', 'users.id')
            ->where('chat_presences.submateri', $submateri)
            ->where('chat_presences.kelompok_id', $user->kelompok_id) // 👈 KUNCI ISOLASINYA DI SINI
            ->where('chat_presences.last_active', '>=', $waktuBatas)
            ->pluck('users.nama_lengkap')
            ->toArray();

        return response()->json(['online_users' => $onlineUsers]);
    }

    // 5. Bersihkan Chat
    public function clearChat(Request $request, $submateri)
    {
        \App\Models\ChatMessage::where('user_id', session('user_id'))
                               ->where('submateri', $submateri)
                               ->delete();

        return response()->json(['status' => 'success']);
    }
}