@extends('layout')

@section('content')
    <br>
    <a href="{{ route('journeys.create') }}"><button class="btn btn-primary">Nova Corrida</button></a>
    <hr>

    <table class="table table-striped">
        <thead>
        <tr align="center">
            <th scope="col">#</th>
            <th scope="col">Valor</th>
            <th scope="col">Motorista</th>
            <th scope="col">CPF</th>
            <th scope="col">Passageiro</th>
            <th scope="col">CPF</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($journeys as $journey)
            <tr align="center">
                <th scope="row">{{ $journey->id }}</th>
                <td>R$ {{ number_format($journey->valor, 2) }}</td>
                <td>{{ $journey->driver->nome }}</td>
                <td>{{ $journey->driver->cpf }}</td>
                <td>{{ $journey->passenger->nome }}</td>
                <td>{{ $journey->passenger->cpf }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection