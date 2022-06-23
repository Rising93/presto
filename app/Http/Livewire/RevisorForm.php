<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Mail\BecomeRevisor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorForm extends Component
{
    public function becomeRevisor()
    {
        if(!Auth::user())
        {  
        return redirect()->back()->with('status', 'Devi effettuare il login prima di poter inviare la richiesta!');
        }
        
        if(Auth::user()->is_revisor){
            return redirect()->back()->with('allert', 'Sei già un revisore. Non puoi candidarti!');
        }else if(!Auth::user()->is_revisor){
            Mail::to('pippo@gmail.com')->send(new BecomeRevisor(Auth::user()));
            return redirect()->back()->with('message', 'La candidatura è stata inviata con successo. Verrai ricontattato a breve da un nostro Amministratore!');
        };
      
    }



    public function render()
    {
        return view('livewire.revisor-form');
    }
}
