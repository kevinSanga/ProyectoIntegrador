@extends('layouts.app')

@section('content')
    <h2>Dashboard Notario</h2>
    <p>Bienvenido Notario {{ auth()->user()->name }}.</p>
    <p>Consulta tus casos, citas y dicta opiniones legales.</p>
@endsection
