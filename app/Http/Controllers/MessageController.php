<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;

class MessageController extends Controller
{

    public function store(StoreMessageRequest $request)
    {
        Message::create($request->validated());
        return redirect()->back()->with('success', 'Message sent successfully');
    }

}
