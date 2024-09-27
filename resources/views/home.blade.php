@extends('layouts.app')

@section('content')
<ul>
    <li><a href="#">Dashboard</a></li>
    <li><a href="#">Usuarios</a></li>
    <li><a href="#">Ventas</a></li>
    <li><a href="#">Compras</a></li>
    <li><a href="{{ route('productos.index') }}">Mantención de Tablas</a></li>
    <li><a href="#">Reportes</a></li>
</ul>

@endsection
