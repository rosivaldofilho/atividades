<!-- resources/views/usuarios/create.blade.php -->

<!-- Extensão do layout principal (se você estiver usando um layout base) -->
@extends('layouts.app')

@section('content')
    <!-- Título da página -->
    <h1>Criar Novo Usuário</h1>

    <!-- Formulário para criar um novo usuário -->
    <form action="{{ route('usuarios.store') }}" method="POST">
        <!-- Token CSRF para proteção contra ataques CSRF -->
        @csrf

        <!-- Campo para o nome do usuário -->
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
            <!-- Mensagem de erro caso a validação falhe -->
            @error('nome')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo para selecionar o departamento do usuário -->
        <div class="mb-3">
            <label for="departamento_id" class="form-label">Departamento</label>
            <select name="departamento_id" id="departamento_id" class="form-select" required>
                <option value="">Selecione um Departamento</option>
                <!-- Loop para iterar sobre os departamentos disponíveis -->
                @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}" {{ old('departamento_id') == $departamento->id ? 'selected' : '' }}>
                        {{ $departamento->descricao }}
                    </option>
                @endforeach
            </select>
            <!-- Mensagem de erro caso a validação falhe -->
            @error('departamento_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Botões de envio e cancelamento -->
        <div class="mb-3">
            <!-- Botão para enviar o formulário -->
            <button type="submit" class="btn btn-primary">Salvar</button>

            <!-- Link para voltar à lista de usuários -->
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection