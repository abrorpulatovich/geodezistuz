<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Contact::orderBy('is_read')->paginate(10);
        return view('admin.message.index', compact('messages'));
    }

    public function details($id)
    {
        $message = Contact::find($id);
        $message->is_read = true;
        $message->save();

        return view('admin.message.details', compact('message'));
    }

}
