@extends('layouts.app')

@section('botones')
<a href="{{ route('productos.create') }}" class="btn btn-outline-primary font-weight-bold text-uppercase ml-4">Agregar Producto</a>
@endsection

@section('content')

<h2 class="text-center mb-5">Administra Productos</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Descripcion</th>
            <th scope="col">imagen</th>
            <th scope="col">Categoria</th>
            <th scope="col">Stock</th>
            <th scope="col">Precio de Compra</th>
            <th scope="col">Precio de Venta</th>
            <th scope="col">Agregado</th>
            <th scope="col">Acción</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($productos as $producto)
        <tr>
            <th scope="row">{{ $producto->id }}</th>
            <td>{{ $producto->descripcion }}</td>
            <td><img src="/storage/{{ $producto->imagen }}" style="width: 70px" alt="imagen"></td>
            <td>{{ $producto->categoria->nombre }}</td>
            <td>{{ $producto->stock }}</td>
            <td>{{ $producto->precio_de_compra }}</td>
            <td>{{ $producto->precio_de_venta }}</td>
            <td>{{ $producto->created_at->diffForHumans() }}</td>
            <td>
                <a href="{{ route('productos.edit', ['producto' => $producto->id]) }}" class="btn btn-success">Editar</a>
                <eliminar-producto producto-id = {{ $producto->id }} ></eliminar-producto>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>



@endsection
