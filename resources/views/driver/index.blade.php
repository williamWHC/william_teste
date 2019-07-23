@extends('layout')

@section('content')
   <br>
   <a href="{{ route('drivers.create') }}"><button class="btn btn-primary">Novo Motorista</button></a>
   <hr>

   <table class="table table-striped">
      <thead>
      <tr align="center">
         <th scope="col">Nome</th>
         <th scope="col">Sexo</th>
         <th scope="col">Data de nascimento</th>
         <th scope="col">CPF</th>
         <th scope="col">Modelo do carro</th>
         <th scope="col">Status</th>
         <th scope="col">#</th>
      </tr>
      </thead>
      <tbody>
         @foreach ($drivers as $driver)
         <tr align="center">
            <td>{{ $driver->nome }}</td>
            <td>{{ $driver->sexo }}</td>
            <td>{{ \Carbon\Carbon::parse($driver->nascimento)->format('d/m/Y') }}</td>
            <td>{{ $driver->cpf }}</td>
            <td>{{ $driver->vehicle->modelo }}</td>
            <td>{{ $driver->status ? 'ATIVO' : 'INATIVO' }}</td>
            <td>
               <a href="{{ route('drivers.edit', ['driver' => $driver->id]) }}">
                  <button class="btn btn-primary">Editar</button>
               </a>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
@endsection