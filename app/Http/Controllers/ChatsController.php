<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Inertia\Inertia;
use Inertia\Response;

class ChatsController extends Controller
{
    public function index() {
        $messages = Message::all();
        return Inertia::render('Chat', compact('messages'));
    }
}
