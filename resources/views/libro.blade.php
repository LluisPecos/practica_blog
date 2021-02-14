@extends('layout')

@section('head')

<!-- head -->
<title>Libro</title>

@endsection

@section('content')

<div class="p-4 rounded" style="background: rgba(255, 255, 255, 0.6)">
    <div class="row">
        
    <?php
        
        if(isset($_GET['id']) && !empty($_GET['id'])) {

            $id_libro = $_GET['id'];

            $resultado = DB::select("select * from libros where id = " . $id_libro . ";");

            if($resultado && count($resultado) == 1) {

                foreach($resultado as $libro) {

                    $titulo = $libro->titulo;
                    $editorial = $libro->editorial;
                    $genero = $libro->genero;
                    $n_copias = $libro->n_copias;
                    $img_portada = $libro->img_portada;

                    ?>
                    <div class="col-12 col-md-4">
                        <img src="{{ URL::asset($img_portada) }}" class="w-100">
                    </div>

                    <div class="col-12 col-md-8 mt-4 mt-md-0 align-self-center">
                        <h3>{{ $titulo }}</h3>
                        <div style="font-size: 20px;">
                            <p class="text-black-50">Editorial: {{ $editorial }}</p>
                            <p><b>Géneros:</b> {{ $genero }}</p>
                            <p><b>Número de copias:</b> {{ $n_copias }}</p>

                            @if(session()->has('id'))

                            <form action="{{ url('comprar-libro') }}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="id_libro" value="{{ $id_libro }}">
                                <input type="hidden" name="id_usuario" value="{{ session()->get('id') }}">
                                <input type="submit" class="btn btn-dark" value="Comprar">
                            </form>

                            @else 

                            <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#modal_registro">Comprar</button>

                            @endif 

                        </div>
                    </div>
                    <?php
                }
            }         
        }
        
        ?>
    </div>
</div>

@endsection