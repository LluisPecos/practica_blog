<?php
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\Middleware\ShareErrorsFromSession
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        @yield('head')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="_token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/general.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    
    <body style="background-image: url({{ URL::asset('imgs/fondo.jpg') }}); background-repeat: none; background-size: cover;">
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Blog</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/inicio">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/biografia">Biografía</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/publicaciones">Publicaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/sugerencias">Sugerencias</a>
                        </li>
                    </ul>
                    
                    @if(session()->has('id'))
                    
                    <div id="dropdown_usuario" class="dropdown dropleft my-2 my-md-0">
                        
                        <button id="btn_usuario" class="btn border-light text-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ session()->get('nombre') }}</button>
                        
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Cuenta</a>
                            <a class="dropdown-item" href="/cerrar-sesion">Cerrar sesión</a>
                        </div>
                    </div>
                    
                    @else 
                        <button id="btn_registro" class="btn border-light text-light" type="button" data-toggle="modal" data-target="#modal_registro">Regístrate o inicia sesión</button>
                    @endif           
                    
                    <!-- Modal registro / inicio -->
                    <div class="modal" id="modal_registro">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                
                                <div id="modal_content_registro">
                                    
                                    <!-- Modal Header -->
                                    <div class="modal-header text-center">
                                        <div class="w-100">
                                            <h5 class="modal-title">Bienvenido a Blog</h5>
                                            <p class="text-black-50 m-0">Regístrate o inicia sesión</p>
                                        </div>

                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <p class="text-center m-0" style="font-size: 20px;">
                                            <a id="a_inicio" class="mr-4 text-decoration-none" href="#">Inicia sesión</a><span class="">|</span><a id="a_registro" class="ml-4 text-decoration-none" href="#">Regístrate</a>
                                        </p>
                                    </div>
                                </div>                              
                                
                                <p class="text-center m-0 p-3" style="font-size: 11px;">
                                    <span class="text-dark" style="opacity: 0.3;">Registrándote aceptas nuestras</span>
                                    <br>
                                    <a class="text-dark" style="opacity: 0.8" href="">Condiciones de uso</a> <span class="text-dark" style="opacity: 0.3">y</span> <a class="text-dark" style="opacity: 0.8" href="">Política de privacidad</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        
        <main class="container py-5">
            
            @if(session()->has('mensajeExito'))
                @if($mensaje = session()->get('mensajeExito'))

                <div class="alert alert-success mb-4" role="alert" style="cursor: pointer">
                    <strong>Bien hecho!</strong> {{ $mensaje }}
                </div>

                @endif
            @endif
            
            
            @if(session()->has('mensajeError'))
                @if($mensaje = session()->get('mensajeError'))
            
                <div class="alert alert-danger mb-4" role="alert" style="cursor: pointer">
                    <strong>ERROR:</strong> {{ $mensaje }}
                </div>
            
                @endif
            @endif
            
            @if($errors->any())
            
            <div class="alert alert-danger mb-4" role="alert" style="cursor: pointer">
                <strong>VALIDATION ERROR:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            
            @endif
            
            @yield('content')
        </main>
        
        <footer>
            <div class="bg-dark d-flex justify-content-center align-items-center" style="height: 50px;">
                <p class="m-0 text-white-50">Copyright ©2021 All rights reserved</p>
            </div>
        </footer>
    </body>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script type="text/javascript" src="{{ URL::asset('js/ajax_setup.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/onload_function.js') }}"></script>
    @include('include/modal_registro_inicio')
</html>
