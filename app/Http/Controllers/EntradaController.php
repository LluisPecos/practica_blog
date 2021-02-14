<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class EntradaController extends Controller
{
    
    function insertar_entrada(Request $request) {
        
        if(session()->has('id') && Session::get('rol') == "adm") {
            
            $titulo = $request->input('titulo');
            $texto = $request->input('texto');
            
            $insertar_entrada = DB::insert("insert into entradas(id_usuario, titulo, texto, created_at) values(" . Session::get('id') . ",'" . $titulo . "','" . $texto . "', now());");
            
            if($insertar_entrada) {
                
                $request->session()->flash('mensajeExito', 'Entrada publicada');
                return redirect()->back();
                
            } else {
                $request->session()->flash('mensajeError', 'Error al insertar la entrada');
                return redirect()->back();
            }
        }
    }
}
