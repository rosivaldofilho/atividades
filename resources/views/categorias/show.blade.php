<!-- resources/views/categorias/show.blade.php -->

<!-- Extensão do layout principal (se você estiver usando um layout base) -->
@extends('layouts.app')

@section('content')
    <!-- Título da página -->
    <h1>Detalhes da Categoria</h1>

    <!-- Exibição dos dados da categoria -->
    <div class="card">
        <div class="card-body">
            <!-- ID da categoria -->
            <p><strong>ID:</strong> {{ $categoria->id }}</p>

            <!-- Descrição da categoria -->
            <p><strong>Descrição:</strong> {{ $categoria->descricao }}</p>

            <!-- Data de criação -->
            <p><strong>Criado em:</strong> {{ $categoria->created_at->format('d/m/Y H:i') }}</p>

            <!-- Data de atualização -->
            <p><strong>Atualizado em:</strong> {{ $categoria->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <!-- Botões de ação -->
    <div class="mt-3">
        <!-- Link para editar a categoria -->
        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">
            Editar
        </a>

        <!-- Formulário para excluir a categoria -->
        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">
                Excluir
            </button>
        </form>

        <!-- Link para voltar à lista de categorias -->
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">
            Voltar
        </a>
    </div>
@endsection