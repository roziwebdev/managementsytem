<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Materialrequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChatmanagerController extends Controller
{
    public function getChat($materialrequestId)
    {
        $materialrequest = Materialrequest::findOrFail($materialrequestId);
        $chats = Chat::where('materialrequest_id', $materialrequestId)->get();
        return response()->json(['chats' => $chats]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'chat' => 'required',
            'materialrequest_id' => 'required|exists:materialrequests,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Batasi tipe file dan ukuran maksimum
        ]);

        $chat = new Chat();
        $chat->chat = $request->chat;
        $chat->materialrequest_id = $request->materialrequest_id;

        // Proses gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Simpan gambar ke direktori penyimpanan
            Storage::disk('public')->put('chat_images/' . $imageName, file_get_contents($image));

            // Simpan nama file gambar ke dalam tabel chats
            $chat->image = 'chat_images/' . $imageName;
        }

        $chat->save();

        // Kembalikan data chat yang baru disimpan
        return response()->json(['chat' => $chat->chat, 'image' => asset('storage/' . $chat->image)], 200);
    }
}
