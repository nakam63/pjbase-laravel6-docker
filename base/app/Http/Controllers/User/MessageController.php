<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Show message for login user.
     */
    public function index(Request $request)
    {
        $messages = Message::latest()->where('user_id', auth()->id())->get();
        return view('user.message.index', compact('messages'));
    }

    /**
     * Show message detail for login user.
     */
    public function show(Message $message)
    {
        abort_unless(auth()->user() == $message->user, 403);
        return view('user.message.show', compact('message'));
    }
}
