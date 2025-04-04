<!-- resources/views/categorias/edit.blade.php -->

<!-- Extensão do layout principal (se você estiver usando um layout base) -->
@extends('layouts.app')

@section('content')
    <!-- Título da página -->
    <h1>Editar Categoria</h1>

    <!-- Formulário para editar a categoria -->
    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        <!-- Token CSRF para proteção contra ataques CSRF -->
        @csrf
        <!-- Método HTTP PUT para atualização -->
        @method('PUT')

        <!-- Campo para a descrição da categoria -->
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ old('descricao', $categoria->descricao) }}" required>
            <!-- Mensagem de erro caso a validação falhe -->
            @error('descricao')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Botões de envio e cancelamento -->
        <div class="mb-3">
            <!-- Botão para enviar o formulário -->
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>

            <!-- Link para voltar à lista de categorias -->
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection