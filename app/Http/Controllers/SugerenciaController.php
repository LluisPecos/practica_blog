<?php

namespace App\Http\Controllers;

use App\Mail\SugerenciaMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class SugerenciaController extends Controller
{
    public function enviar_sugerencia(Request $request) {
        
        if(isset($request->subject) && isset($request->content)) {
            
            /*
            $request->validate([
                'subject' => 'required|min:3',
                'message' => 'required|min:10',
            ]);
            */
            
            $this->validate($request, [
                'subject' => ['required', 'min:3'],
                'content' => ['required', 'min:10'],
            ]);
            
            $correo = new SugerenciaMailable($request->subject, $request->content);
            
            Mail::to('lsuaupecos@iessonferrer.net')->send($correo);
            
            session()->flash('mensajeExito', 'Sugerencia enviada');
            return redirect()->back();
        }
    }
}
