<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactSendmail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show(){
        $reply = Contact::$reply;

        return view('contact',compact('reply'));
    }

    public function confirm(ContactRequest $request){

            //送信
            $contact = new Contact($request->all());
            $contact->fill($request->all())->save();

            Mail::to($contact->email)->send(new ContactSendmail($contact));
        return view('contact_confirm',compact('reply','contact'));
    }

    public function send(){
        return view('contact_tanks');
    }

}
