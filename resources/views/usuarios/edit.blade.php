<!-- resources/views/usuarios/edit.blade.php -->

<!-- Extensão do layout principal (se você estiver usando um layout base) -->
@extends('layouts.app')

@section('title')
    <h2 style="margin-bottom: 0;">Editar Usuário</h2>
@endsection

@section('content')

    <!-- Formulário para editar o usuário -->
    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        <!-- Token CSRF para proteção contra ataques CSRF -->
        @csrf
        <!-- Método HTTP PUT para atualização -->
        @method('PUT')

        <!-- Campo para o nome do usuário -->
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $usuario->nome) }}" required>
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
                    <option value="{{ $departamento->id }}" {{ old('departamento_id', $usuario->departamento_id) == $departamento->id ? 'selected' : '' }}>
                        {{ $departamento->nome }}
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
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>

            <!-- Link para voltar à lista de usuários -->
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection