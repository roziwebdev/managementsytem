<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Materialrequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller
{
    public function getChats($id)
    {
        $materialRequest = Materialrequest::find($id);
        $chats = $materialRequest->chat()->orderByDesc('created_at', 'desc')->get();
        return response()->json($chats);
    }

    public function saveChat(Request $request, $id)
    {
        $materialRequest = Materialrequest::find($id);
        $chat = new Chat();
        $chat->chat = $request->input('chat');
         $chat->created = $request->input('created');
        $materialRequest->chat()->save($chat);

        return response()->json(['success' => true]);
    }
}
