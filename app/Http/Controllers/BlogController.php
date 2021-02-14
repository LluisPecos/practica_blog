<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    function inicio() {
        return view('inicio');
    }
    
    function biografia() {
        return view('biografia');
    }
    
    function publicaciones() {
        return view('publicaciones');
    }
    
    function sugerencias() {
        return view('sugerencias');
    }
}
