@extends('layouts.app')

@section('botones')
<a href="#" class="btn btn-outline-primary font-weight-bold text-uppercase ml-4" data-toggle="modal" data-target="#exampleModal">Agregar Producto</a>
@endsection

@section('content')

<h2 class="text-center mb-5">Administra Productos</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Categoria</th>
            <th scope="col">Stock</th>
            <th scope="col">Precio de Compra</th>
            <th scope="col">Precio de Venta</th>
            <th scope="col">Agregado</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($productos as $producto)
        <tr>
            <th scope="row">{{ $producto->id }}</th>
            <td>{{ $producto->descripcion }}</td>
            <td>{{ $producto->categoria->nombre }}</td>
            <td>{{ $producto->stock }}</td>
            <td>{{ $producto->precio_de_compra }}</td>
            <td>{{ $producto->precio_de_venta }}</td>
            <td>{{ $producto->created_at->diffForHumans() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center" id="exampleModalLabel">Agregar Producto</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('productos.store') }}" method="POST" novalidate enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="">Descripción</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control @error('descipcion') is-invalid @enderror" placeholder="Descripción" value="{{ old('descripcion') }}">
                        @error('descripcion')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="categoria">Categoría</label>
                        <select name="categoria" id="categoria" class="form-control @error('categoria') is-invalid @enderror">

                            <option value="">--Seleccione--</option>

                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Stock</label>
                        <input type="text" id="stock" name="stock" class="form-control @error('stock') is-invalid @enderror">

                        @error('stock')
                            <span class="is-invalid-feedback d-block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-row">

                        <div class="form-group col-6">
                            <label for="">Precio de Compra</label>
                            <input type="text" name="precio_de_compra" id="precio_de_compra" class="form-control @error('precio_de_compra') is-invalid @enderror">

                            @error('precio_de_compra')
                                <span class="is-invalid-feedback d-block">
                                    <strong>{{ $mesagge }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="">Precio de Venta</label>
                            <input type="text" name="precio_de_venta" id="precio_de_venta" class="form-control @error('precio_de_venta') is-invalid @enderror">
                            @error('precio_de_venta')
                                <span class="is-invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group modal-footer">
                        <input type="submit" class="btn btn-primary" value="Agregar Producto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@endsection
