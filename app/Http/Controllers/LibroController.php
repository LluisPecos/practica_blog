<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LibroController extends Controller
{
    function libro() {
        return view('libro');
    }
    
    function comprar_libro(Request $request) {
        
        if(isset($request->id_libro) && isset($request->id_usuario)) {
            
            $id_usuario = $request->input('id_usuario');
            $id_usuario_sesion = $request->session()->get('id');
            $id_libro = $request->input('id_libro');
            
            if($id_usuario == $id_usuario_sesion) {
                $get_n_copias = DB::select("select n_copias from libros where id = " . $id_libro);
                
                if($get_n_copias) {
                    
                    foreach($get_n_copias as $fila) {
                        $n_copias = $fila->n_copias;
                        
                        if($n_copias > 0) {
                            $insertar_venta = DB::insert("insert into ventas(id_usuario, id_libro, fecha) values(" . $id_usuario . "," . $id_libro . ", now());");
                            
                            if($insertar_venta) {
                                
                                // Venta insertada
                                
                                $disminuir_copia = DB::update("update libros set n_copias = (n_copias - 1) where id = " . $id_libro . ";");
                                
                                if($disminuir_copia) {
                                    session()->flash('mensajeExito', 'Gracias por comprar!');
                                    return redirect()->back();
                                }
                            } else {
                                session()->flash('mensajeExito', 'Ha surgido un error inesperado al comprar');
                                return redirect()->back();
                            }
                            
                        } else {
                            session()->flash('mensajeError', 'Lo sentimos, no quedan copias de este libro');
                            return redirect()->back();
                        }
                    }
                }
            } else {
                session()->flash('mensajeError', 'Error al verificar tu ID de usuario');
                return redirect()->back();
            }
        }
    }
}
