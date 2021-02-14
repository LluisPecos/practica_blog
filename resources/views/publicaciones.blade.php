@extends('layout')

@section('head')

<!-- head -->
<title>Publicaciones</title>

@endsection

@section('content')

<div class="row">
    
    <?php

    $libros = DB::select("select * from libros");
    
    if($libros) {
        
        foreach($libros as $libro) {
            $img_portada = $libro->img_portada;
            ?>
            
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100">
                    <form action="{{ url('libro') }}" method="get"><input type="hidden" name="id" value="{{ $libro->id }}"><div class="card-img-top form_comprar" alt="Card image" style="background-image: url({{ URL::asset($img_portada) }}); background-repeat: none; background-size: cover; background-position: center center; height: 400px; cursor: pointer"></div></form>
                    
                    <div class="card-body">
                        <h4 class="card-title" style="font-size: 18px;">{{ $libro->titulo }}</h4>
                        <p class="card-text text-black-50">{{ $libro->editorial }}</p>
                        <form action="{{ url('libro') }}" method="get">
                            <input type="hidden" name="id" value="{{ $libro->id }}">
                            <a class="btn btn-dark form_comprar">Comprar</a>
                        </form>
                    </div>
                </div>
            </div>
    
            <?php
        }
        
    }
    ?>
    
</div>

<script type="text/javascript">
    
    window.onload = add_event_listeners();
    
    function add_event_listeners() {
        
        let form_comprar = document.getElementsByClassName("form_comprar");
        
        for(let i = 0; i < form_comprar.length; i++) {
            
            form_comprar[i].addEventListener("click", function() {
                this.parentNode.submit();
            });
        }
    }
    
</script>
    
@endsection