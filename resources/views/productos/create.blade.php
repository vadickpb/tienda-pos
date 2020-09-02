@extends('layouts.app')

@section('botones')
    <a href="#" class="btn btn-outline-success">Volver</a>
@endsection

@section('content')

<h2 class="text-center">Agregar Productos</h2>

<div class="row justify-content-center mt-5">
    <div class="col-6">

        <form action="{{ route('productos.store') }}" method="POST" novalidate enctype="multipart/form-data">
            @csrf

            <div class="form-group mt-3">
                <label for="">Descripción</label>
                <input type="text" name="descripcion" id="descripcion"
                    class="form-control @error('descripcion') is-invalid @enderror" placeholder="Descripción"
                    value="{{ old('descripcion') }}">
                @error('descripcion')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="categoria">Categoría</label>
                <select name="categoria" id="categoria" class="form-control @error('categoria') is-invalid @enderror">

                    <option value="">--Seleccione--</option>

                    @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                    @endforeach
                </select>

                @error('categoria')
                <span class="invalid-feedback d-block">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="">Stock</label>
                <input type="text" id="stock" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}">

                @error('stock')
                <span class="invalid-feedback d-block">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-row mt-3">

                <div class="form-group col-6">
                    <label for="">Precio de Compra en S/ .</label>
                    <input type="text" name="precio_de_compra" id="precio_de_compra"
                        class="form-control @error('precio_de_compra') is-invalid @enderror" value="{{ old('precio_de_compra') }}">

                    @error('precio_de_compra')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="">Precio de Venta en S/ .</label>
                    <input type="text" name="precio_de_venta" id="precio_de_venta"
                        class="form-control @error('precio_de_venta') is-invalid @enderror" value="{{ old('precio_de_venta') }}">
                    @error('precio_de_venta')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group mt-3">
                <label for="imagen">Elige una Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control @error('imagen') is-invalid @enderror">
                @error('imagen')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>



            <div class="form-group modal-footer">
                <button type="input" class="btn btn-primary">Agregar Producto</button>
                {{-- <input type="submit" class="btn btn-primary" value="Agregar Producto"> --}}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>

        </form>
    </div>
    </div>


@endsection
