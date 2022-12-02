<?php

namespace App\Http\Controllers\Site\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('site.dashboard.client.chats');
    }
}
