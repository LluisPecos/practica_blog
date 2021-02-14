@extends('layout')

@section('head')

<!-- head -->
<title>Inicio</title>
<link href="{{ URL::asset('css/inicio.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('content')

<div id="inicio" class="row">
    <div class="col-12 col-md-8">
        
        @if(session()->has('id') && session()->has('rol'))
            @if(Session::get('rol') == "adm")
        
                <section>
                    <form action="{{ url('insertar-entrada') }}" method="get" class="p-3">
                        <h3 class="mb-3">Nueva entrada</h3>
                        
                        <div class="form-group">
                            <input name="titulo" class="form-control" type="text" placeholder="Título" required>
                        </div>
                        
                        <div class="form-group">
                            <textarea name="texto" class="form-control" placeholder="Contenido" style="resize: none; height: 150px;" required></textarea>
                        </div>
                        
                        <input id="btn_entrada" class="form-control btn border-light text-light" type="submit">
                        
                    </form>
                </section>
        
            @endif
        @endif
        
        @php
        $entradas = DB::select("select * from entradas order by created_at desc;");
        @endphp
        
        @if($entradas) 
            
            @foreach($entradas as $entrada) 
                
                @php
                $resultado = DB::select("select nombre, apellidos from usuarios u 
                                         join entradas e on u.id = e.id_usuario 
                                         where u.id = " . $entrada->id_usuario . " and e.id = " . $entrada->id . ";");
                @endphp
                
                
                @foreach($resultado as $autor) 
        
                    <section>
                        <p class="section_date">{{ $entrada->created_at }}</p>
                        <hr>
                        <p class="section_title">{{ $entrada->titulo }}</p>
                        <p id="{{ $entrada->id }}" class="section_content">{{ $entrada->texto }}</p>
                        <p class="section_footer">Publicado por {{ $autor->nombre }} {{ $autor->apellidos }} el {{ $entrada->created_at }}</p>
                    </section>
        
                @endforeach
            @endforeach
        @endif
        
    </div>
    
    <div class="col-12 col-md-4">
        <aside>
            <p class="aside_title">Aside Title</p>
            <hr>
            <p class="aside_content">Lorem ipsum dolor sit amet consectetur adipiscing elit magna pharetra, erat nam blandit dictum sagittis hac vitae ultrices, leo augue sociosqu aptent hendrerit facilisis elementum iaculis. Ad odio nascetur posuere metus hendrerit tristique varius aliquet dui eu felis euismod, eget malesuada nullam cubilia condimentum arcu ullamcorper risus suscipit lectus congue. Primis ligula enim netus platea sociis volutpat pulvinar maecenas rutrum aliquam, dictum nascetur suscipit hendrerit eros magna conubia fermentum.</p>
        </aside>
        
        <aside>
            <p class="aside_title">Aside Title</p>
            <hr>
            <p class="aside_content">Lorem ipsum dolor sit amet consectetur adipiscing elit magna pharetra, erat nam blandit dictum sagittis hac vitae ultrices, leo augue sociosqu aptent hendrerit facilisis elementum iaculis. Ad odio nascetur posuere metus hendrerit tristique varius aliquet dui eu felis euismod, eget malesuada nullam cubilia condimentum arcu ullamcorper risus suscipit lectus congue. Primis ligula enim netus platea sociis volutpat pulvinar maecenas rutrum aliquam, dictum nascetur suscipit hendrerit eros magna conubia fermentum.</p>
        </aside>
        
        <aside>
            <p class="aside_title">Aside Title</p>
            <hr>
            <p class="aside_content">Lorem ipsum dolor sit amet consectetur adipiscing elit magna pharetra, erat nam blandit dictum sagittis hac vitae ultrices, leo augue sociosqu aptent hendrerit facilisis elementum iaculis. Ad odio nascetur posuere metus hendrerit tristique varius aliquet dui eu felis euismod, eget malesuada nullam cubilia condimentum arcu ullamcorper risus suscipit lectus congue. Primis ligula enim netus platea sociis volutpat pulvinar maecenas rutrum aliquam, dictum nascetur suscipit hendrerit eros magna conubia fermentum.</p>
        </aside>
    </div>
</div>

<script type="text/javascript">
    function insertar_entrada(texto) {
        
        this.innerHTML = texto;
        
    }
</script>

@endsection