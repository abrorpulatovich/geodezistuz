<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function contact(Request $request)
    {
        $data = $this->validate($request, [
            'fio' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        Contact::create($data);

        return redirect()->route('contact')->with('sent_successfully', 'Xabaringiz muvaffaqiyatli jo\'natildi. Yaqin orada siz bilan qayta aloqaga chiqiladi.');
    }
}
