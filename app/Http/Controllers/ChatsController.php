<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageNotification;

class ChatsController extends Controller
{
    public function index() {
        return Inertia::render('Chat');
    }

    public function store(Request $request) {
        $user = Auth::user();
        $message = $user->messages()->create([
            'message' => $request->message    
        ]);
        broadcast(new MessageNotification($user, $message))->toOthers();
        return Message::with('user')->get();
    }

    public function fetchMessages() {
        return Message::with('user')->get();
    }
}
