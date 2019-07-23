@extends('layout')

@section('content')
    <br>
    <a href="{{ route('passengers.create') }}"><button class="btn btn-primary">Novo Passageiro</button></a>
    <hr>

    <table class="table table-striped">
        <thead>
        <tr align="center">
            <th scope="col">Nome</th>
            <th scope="col">Sexo</th>
            <th scope="col">Data de nascimento</th>
            <th scope="col">Cpf</th>
            <th scope="col">#</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($passengers as $passenger)
            <tr align="center">
                <td>{{ $passenger->nome }}</td>
                <td>{{ $passenger->sexo }}</td>
                <td>{{ \Carbon\Carbon::parse($passenger->nascimento)->format('d/m/Y') }}</td>
                <td>{{ $passenger->cpf }}</td>
                <td>
                    <a href="{{ route('passengers.edit', ['passenger' => $passenger->id]) }}">
                        <button class="btn btn-primary">Editar</button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection