<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendMail(Request $request){
        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $message = $request->input('body');
        $info = compact('name','email','message','surname');
        $contactMail = new ContactMail($info);
        Mail::to('pippo@pippo.it')->send($contactMail);
        return redirect()->route('home')->with('emailsend','Email inviata con successo! Verrai contattato appena possibile da un nostro consulente!');
    }

}
