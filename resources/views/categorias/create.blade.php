<!-- resources/views/categorias/create.blade.php -->

<!-- Extensão do layout principal (se você estiver usando um layout base) -->
@extends('layouts.app')

@section('title')
    <h2 style="margin-bottom: 0;">Criar Nova Categoria</h2>
@endsection

@section('content')

    <!-- Formulário para criar uma nova categoria -->
    <form action="{{ route('categorias.store') }}" method="POST">
        <!-- Token CSRF para proteção contra ataques CSRF -->
        @csrf

        <!-- Campo para o nome da categoria -->
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
            <!-- Mensagem de erro caso a validação falhe -->
            @error('nome')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Botões de envio e cancelamento -->
        <div class="mb-3">
            <!-- Botão para enviar o formulário -->
            <button type="submit" class="btn btn-primary">Salvar</button>

            <!-- Link para voltar à lista de categorias -->
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection