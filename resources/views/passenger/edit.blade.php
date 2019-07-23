@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="card uper">
        <div class="card-header">
            Editar passageiro
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
            <form method="post" action="{{ route('passengers.update', ['passenger' => $passenger->id]) }}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input id="nome" type="text" class="form-control" name="nome" value="{{ $passenger->nome }}"required/>
                </div>
                <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <select id="sexo" class="form-control" name="sexo">
                        <option value="">Selecione uma opção</option>
                        @foreach ($genders as $key => $gender)
                            <option value="{{ $key }}" @if($passenger->sexo == $key) selected @endif>{{ $gender }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nascimento">Data de nascimento</label>
                    <input id="nascimento" type="date" class="form-control" name="nascimento" value="{{ $passenger->nascimento }}"/>
                </div>
                <div class="form-group">
                    <label for="cpf">Cpf</label>
                    <input id="cpf" type="number" class="form-control" name="cpf" value="{{ $passenger->cpf }}"/>
                </div>
                <button type="submit" class="btn btn-primary" id="btnGravar">Editar</button>
            </form>
        </div>
    </div>

<script>
    $('#btnGravar').click(function (event) {
        event.preventDefault();

        var isValidCpf = validCpf($('#cpf').val());

        if (!isValidCpf) {
            alert('CPF inválido');
            return false;
        }

        $('form').submit();
    });
</script>
@endsection