<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = Categoria::all();
        return view('productos.create' , compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        //Validar los datos
        $data = $request->validate([
            'descripcion' => 'required|min:10',
            'categoria' => 'required',
            'stock' => 'required|numeric',
            'precio_de_compra' => 'required|numeric',
            'precio_de_venta' => 'required|numeric',
            'imagen' => 'image'
            ]);
            //dd($request->all());

        //obtener la ruta de la imagen
        $ruta_imagen = $request['imagen']->store('uploads-productos', 'public');

        //resize de la imagen

        //asignar los valores
        Producto::create([
            'descripcion' => $data['descripcion'],
            'categoria_id' => $data['categoria'],
            'stock' => $data['stock'],
            'precio_de_compra' => $data['precio_de_compra'],
            'precio_de_venta' => $data['precio_de_venta'],
            'imagen' => $ruta_imagen
        ]);

        //guardar en la base de datos


        //redireccionar
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
        $categorias = Categoria::all();
        return view('productos.edit', compact('categorias', 'producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //validar el formulario
        $data = $request->validate([
            'descripcion' => 'required|min:8',
            'categoria' => 'required',
            'stock' => 'required|numeric',
            'precio_de_compra' => 'required|numeric',
            'precio_de_venta' => 'required|numeric',
            'imagen' => 'image'
        ]);

        //asignar nuevos valores
        $producto->descripcion = $data['descripcion'];
        $producto->categoria_id = $data['categoria'];
        $producto->stock = $data['stock'];
        $producto->precio_de_compra = $data['precio_de_compra'];
        $producto->precio_de_venta = $data['precio_de_venta'];

        $producto->save();

        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //


        $producto->delete();
        return redirect()->route('productos.index');
    }
}
