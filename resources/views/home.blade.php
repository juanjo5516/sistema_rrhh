@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Bienvenido al Sistema de Recursos Humanos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Este espacio está diseñado para dar una bienvenida al usuario y poder brindar una descripción de las funciones del sistema, además
                    , si se desea poder mostrar imágenes que deseen.
                </div>               
            </div>
        </div>
    </div>
</div>
@endsection
