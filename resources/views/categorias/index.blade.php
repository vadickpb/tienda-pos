@extends('layouts.app')

@section('botones')
    <a href="#" class="btn btn-outline-primary font-weight-bold text-uppercase ml-4">Agregar Producto</a>
@endsection

@section('content')

<h2 class="text-center mb-5">Administra las Categorias</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($categorias as $categoria)
        <tr>
            <th scope="row">{{ $categoria->id }}</th>
            <td>{{ $categoria->nombre }}</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
