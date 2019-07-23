@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="card uper">
        <div class="card-header">
            Cadastrar motorista
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
            <form method="post" action="{{ route('drivers.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="nome">Nome</label>
                    <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}"required/>
                </div>
                <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <select id="sexo" class="form-control" name="sexo">
                        <option value="">Selecione uma opção</option>
                        @foreach ($genders as $key => $gender)
                            <option value="{{ $key }}" @if(old('sexo') == $key) selected @endif>{{ $gender }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nascimento">Data de nascimento</label>
                    <input id="nascimento" type="date" class="form-control" name="nascimento" value="{{ old('nascimento') }}"required/>
                </div>
                <div class="form-group">
                    <label for="cpf">Cpf</label>
                    <input id="cpf" type="number" class="form-control" name="cpf" value="{{ old('cpf') }}" required/>
                </div>
                <div class="form-group">
                    <label for="quantidade">Modelo do veículo</label>
                    <input id="quantidade" type="text" class="form-control" name="modelo" value="{{ old('modelo') }}"/>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" class="form-control" name="status">
                        @foreach ($status as $key => $s)
                            <option value="{{ $key }}">{{ $s }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" id="btnGravar">Gravar</button>
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

        var isOfAge = validOfAge($('#nascimento').val());

        if (!isOfAge) {
            alert('O motorista deve ter mais de 18 anos.');
            return false;
        }

        $('form').submit();
    });
</script>
@endsection