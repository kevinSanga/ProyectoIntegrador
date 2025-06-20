@extends('layouts.app')

@section('content')
    <h2>Dashboard Ayudante</h2>
    <p>Hola {{ auth()->user()->name }}.</p>
    <p>Revisa tus tareas asignadas y apoya en la gestión de documentos.</p>
@endsection
