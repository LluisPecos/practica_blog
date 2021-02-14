<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RegisterController extends Controller {
    
    function validar_registro_ajax(Request $request) {
        // POST method
        if(isset($request->email)) {
            
            $email = $request->input('email');
            
            $buscar_email = DB::select("select email from usuarios where email = '" . $email . "';");
            
            if (count($buscar_email) >= 1) {
                echo "Dirección de email duplicada";
            } else {
                echo "registroExito";
            }
        }
    }
    
    function validar_registro(Request $request) {
        
        // POST method
        if(isset($request->nombre) && isset($request->apellidos) && isset($request->email) && isset($request->contraseña) && isset($request->contraseña_repetida)) {
            
            $this->validate($request, [
                'nombre' => ['required', 'regex:/(^.+$)/'],
                'apellidos' => ['required', 'regex:/^.+$/'],
                'email' => ['required', 'regex:/^.+@.+\..+$/'],
                'contraseña' => ['required', 'min:8', 'max:25', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d\w\W]{8,25}$/'],
                'contraseña_repetida' => ['required', 'min:8', 'max:25', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d\w\W]{8,25}$/'],
            ]);
            
            $nombre = $request->input('nombre');
            $apellidos = $request->input('apellidos');
            $email = $request->input('email');
            $contraseña = $request->input('contraseña');
            $contraseña_repetida = $request->input('contraseña_repetida');
            
            $buscar_email = DB::select("select email from usuarios where email = '" . $email . "';");
            
            if (count($buscar_email) >= 1) {
                $request->session()->flash('mensajeError', 'Dirección de email duplicada');
                return redirect()->back();
                
            } else {
                
                if ($contraseña == $contraseña_repetida) {
                    
                    $ctrs_cifrada = bcrypt($contraseña);
                    
                    $insertar_usuario = DB::insert("insert into usuarios(nombre, apellidos, email, contraseña) values ('" . $nombre . "', '" . $apellidos . "', '" . $email . "', '" . $ctrs_cifrada . "');");
                    
                    if ($insertar_usuario) {
                        $request->session()->flash('mensajeExito', 'Te has registrado!');
                        return redirect()->back();
                    } else {
                        $request->session()->flash('mensajeError', 'Ha surgido un error inesperado al registrarse');
                        return redirect()->back();
                    }
                    
                } else {
                    $request->session()->flash('mensajeError', 'Las contraseñas no coinciden');
                    return redirect()->back();
                }
            }
        }
    }
}