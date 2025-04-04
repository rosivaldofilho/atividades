<!-- resources/views/atividades/show.blade.php -->

<!-- Extensão do layout principal (se você estiver usando um layout base) -->
@extends('layouts.app')

@section('content')
    <!-- Título da página -->
    <h1>Detalhes da Atividade</h1>

    <!-- Exibição dos dados da atividade -->
    <div class="card">
        <div class="card-body">
            <!-- ID da atividade -->
            <p><strong>ID:</strong> {{ $atividade->id }}</p>

            <!-- Data da atividade -->
            <p><strong>Data:</strong> {{ $atividade->data_atividade->format('d/m/Y') }}</p>

            <!-- Hora de início -->
            <p><strong>Hora de Início:</strong> {{ $atividade->hora_inicio }}</p>

            <!-- Hora de término -->
            <p><strong>Hora de Término:</strong> {{ $atividade->hora_fim }}</p>

            <!-- Descrição da atividade -->
            <p><strong>Descrição:</strong> {{ $atividade->descricao }}</p>

            <!-- Categoria associada -->
            <p><strong>Categoria:</strong> {{ $atividade->categoria->descricao ?? 'Sem Categoria' }}</p>

            <!-- Usuário responsável -->
            <p><strong>Usuário:</strong> {{ $atividade->usuario->nome ?? 'Sem Usuário' }}</p>

            <!-- Departamento associado -->
            <p><strong>Departamento:</strong> {{ $atividade->departamento->descricao ?? 'Sem Departamento' }}</p>

            <!-- Status da atividade -->
            <p><strong>Status:</strong> {{ $atividade->status }}</p>

            <!-- Observação -->
            <p><strong>Observação:</strong> {{ $atividade->observacao ?? 'Nenhuma observação registrada' }}</p>

            <!-- Data de criação -->
            <p><strong>Criado em:</strong> {{ $atividade->created_at->format('d/m/Y H:i') }}</p>

            <!-- Data de atualização -->
            <p><strong>Atualizado em:</strong> {{ $atividade->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <!-- Botões de ação -->
    <div class="mt-3">
        <!-- Link para editar a atividade -->
        <a href="{{ route('atividades.edit', $atividade->id) }}" class="btn btn-warning">
            Editar
        </a>

        <!-- Formulário para excluir a atividade -->
        <form action="{{ route('atividades.destroy', $atividade->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta atividade?')">
                Excluir
            </button>
        </form>

        <!-- Link para voltar à lista de atividades -->
        <a href="{{ route('atividades.index') }}" class="btn btn-secondary">
            Voltar
        </a>
    </div>
@endsection