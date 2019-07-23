@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="card uper">
        <div class="card-header">
            Cadastrar viagem
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div id="errors" class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('journeys.store') }}">
                @csrf
                <div class="form-group">
                    <label for="valor">Valor</label>
                    <input id="valor" type="text" class="form-control" name="valor" pattern="(^\d+(\.\d{1,2})?$" value="{{ old('valor') }}"/>
                </div>
                <div class="form-group">
                    <label for="motorista">Motoristas</label>
                    <select id="motorista" class="form-control" name="motorista">
                        <option value="">Selecione uma opção</option>
                        @foreach ($drivers as $driver)
                            <option value="{{ $driver->id }}" @if(old('motorista') == $driver->id) selected @endif>{{ $driver->nome }}  - CPF: {{ $driver->cpf }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="passageiro">Passageiros</label>
                    <select id="passageiro" class="form-control" name="passageiro">
                        <option value="">Selecione uma opção</option>
                        @foreach ($passengers as $key => $passenger)
                            <option value="{{ $passenger->id }}" @if(old('passageiro') == $passenger->id) selected @endif>{{ $passenger->nome }}  - CPF: {{ $passenger->cpf }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" id="btnGravar">Gravar</button>
            </form>
        </div>
    </div>
@endsection