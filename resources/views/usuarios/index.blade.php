@extends('layouts.app')

@section('content')

<h2 class="text-center mb-5">Administra los Usuarios</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
