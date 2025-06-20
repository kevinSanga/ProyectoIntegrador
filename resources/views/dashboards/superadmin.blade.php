@extends('layouts.app')

@section('content')
    <h2>Dashboard Super Admin</h2>
    <p>Bienvenido, {{ auth()->user()->name }}.</p>
    <p>Desde aquí puedes gestionar usuarios, roles, y todo el sistema.</p>
@endsection
