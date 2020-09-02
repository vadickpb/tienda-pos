@extends('layouts.app')

@section('botones')
    <a href="#" class="btn btn-outline-success">Volver</a>
@endsection

@section('content')

<h2 class="text-center">Editar Producto</h2>

<div class="row justify-content-center mt-5">
    <div class="col-6">

        <form action="{{ route('productos.update', ['producto'=> $producto]) }}" method="POST" novalidate enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="">Descripción</label>
                <input type="text" name="descripcion" id="descripcion"
                    class="form-control @error('descripcion') is-invalid @enderror" placeholder="Descripción"
                    value="{{ $producto->descripcion}}">
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
                    <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                    @endforeach
                </select>

                @error('categoria')
                <span class="invalid-feedback d-block">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Stock</label>
                <input type="text" id="stock" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ $producto->stock }}">

                @error('stock')
                <span class="invalid-feedback d-block">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-row">

                <div class="form-group col-6">
                    <label for="">Precio de Compra en S/ .</label>
                    <input type="text" name="precio_de_compra" id="precio_de_compra"
                        class="form-control @error('precio_de_compra') is-invalid @enderror" value="{{ $producto->precio_de_compra }}">

                    @error('precio_de_compra')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="">Precio de Venta en S/ .</label>
                    <input type="text" name="precio_de_venta" id="precio_de_venta"
                        class="form-control @error('precio_de_venta') is-invalid @enderror" value="{{ $producto->precio_de_venta }}">
                    @error('precio_de_venta')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>



            <div class="form-group modal-footer">
                <button type="input" class="btn btn-primary">Editar Producto</button>
                {{-- <input type="submit" class="btn btn-primary" value="Agregar Producto"> --}}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>

        </form>
    </div>
    </div>


@endsection
