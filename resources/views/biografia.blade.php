@extends('layout')

@section('head')

<!-- head -->
<title>Biografia</title>

@endsection

@section('content')

<div class="p-4 rounded" style="background-color: rgba(255, 255, 255, 0.6)">
    <h3>Miguel de Cervantes</h3>
    <hr>
    <div class="row align-items-start">
        <div class="col-12 col-md-8">
            <p>Dramaturgo, poeta y novelista español, autor de la novela El ingenioso hidalgo don Quijote de la Mancha, considerada como la primera novela moderna de la literatura universal, Miguel de Cervantes Saavedra tuvo una vida azarosa de la que poco se sabe con seguridad.</p>
            
            <p>Si bien sabemos cuál fue la patria de Cervantes –Alcalá de Henares-, así como el día en que fue bautizado –el 9 de octubre de 1547–, la fecha exacta de su nacimiento no se ha podido averiguar. Tan sólo se supone que podría haber sido el 29 de septiembre, día de San Miguel.</p>
            
            <p>Era el cuarto hijo de los seis que tuvo el matrimonio Rodrigo de Cervantes y Leonor de Cortinas. El padre era cirujano-barbero, profesión de escasos ingresos y baja consideración social. Las estrecheces económicas, en las que sin duda se crió nuestro autor, forzaron a su padre a emprender un vagabundeo por Valladolid, Córdoba y Sevilla en busca de mejor suerte, nunca conseguida, sin que sepamos a ciencia cierta si sus hijos lo acompañaron en sus viajes o no. Si lo hicieron, Cervantes podría haber aprendido sus primeras letras en un colegio de la Compañía de Jesús de esas localidades. Desde 1566 el cirujano-barbero se estableció definitivamente con su familia en Madrid, iniciando por esos años el joven autor su carrera literaria.</p>
        </div>
        
        <div class="col-12 col-md-4 p-2 border border-dark rounded">
            <img class="w-100 h-100 rounded" src="{{ URL::asset('imgs/biografia.jpg') }}">
        </div>
    </div>
</div>

@endsection