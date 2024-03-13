<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Models\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
   /**
     * Retrieve messages between the authenticated user and another user.
     *
     * @param Request $request
     * @param $userId
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $userId)
    {
        $user = $request->user();

        $messages = Message::where(function($query) use ($user, $userId) {
            $query->where('sender_id', $user->id);
            $query->where('receiver_id', $userId);
        })->orWhere(function($query) use ($user, $userId) {
            $query->where('sender_id', $userId);
            $query->where('receiver_id', $user->id);
        })->get();

        return response()->json($messages);
    }

    /**
     * Send a new message from the authenticated user to another user.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        $message = new Message();
        $message->sender_id = $request->user()->id;
        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->save();

        return response()->json($message, 201);
    }
    
}
