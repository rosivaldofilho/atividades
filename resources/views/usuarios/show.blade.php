<!-- resources/views/usuarios/show.blade.php -->

<!-- Extensão do layout principal (se você estiver usando um layout base) -->
@extends('layouts.app')

@section('title')
    <h2 style="margin-bottom: 0;">Detalhes do Usuário</h2>
@endsection

@section('content')

    <!-- Exibição dos dados do usuário -->
    <div class="card">
        <div class="card-body">
            <!-- ID do usuário -->
            <p><strong>ID:</strong> {{ $usuario->id }}</p>

            <!-- Nome do usuário -->
            <p><strong>Nome:</strong> {{ $usuario->nome }}</p>

            <!-- Departamento associado ao usuário -->
            <p><strong>Departamento:</strong> {{ $usuario->departamento->nome ?? 'Sem Departamento' }}</p>

            <!-- Data de criação -->
            <p><strong>Criado em:</strong> {{ $usuario->created_at->format('d/m/Y H:i') }}</p>

            <!-- Data de atualização -->
            <p><strong>Atualizado em:</strong> {{ $usuario->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <!-- Botões de ação -->
    <div class="mt-3">
        <!-- Link para editar o usuário -->
        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">
            Editar
        </a>

        <!-- Formulário para excluir o usuário -->
        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
                Excluir
            </button>
        </form>

        <!-- Link para voltar à lista de usuários -->
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
            Voltar
        </a>
    </div>
@endsection