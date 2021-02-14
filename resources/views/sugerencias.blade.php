@extends('layout')

@section('head')

<!-- head -->
<title>Sugerencias</title>

@endsection

@section('content')

<div class="p-4 rounded" style="background-color: rgba(255, 255, 255, 0.6)">
    <form action="{{ url('enviar-sugerencia') }}" method="post">
        <h2 class="mb-3">Sugerencia</h2>
        {{csrf_field()}}
        <div class="form-group">
            <input class="form-control" type="text" name="subject" placeholder="Motivo" minlength="3" required>
        </div>
        
        <div class="form-group">
            <textarea class="form-control" resize="none" name="content" style="height: 150px;" placeholder="Sugerencia" minlength="10" required></textarea>
        </div>
        
        <input class="form-control btn btn-dark" type="submit">
        
    </form>
</div>

@endsection