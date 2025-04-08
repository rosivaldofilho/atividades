<!-- resources/views/categorias/show.blade.php -->

<!-- Extensão do layout principal (se você estiver usando um layout base) -->
@extends('layouts.app')

@section('title')
    <h2 style="margin-bottom: 0;">Detalhes da Categoria</h2>
@endsection

@section('content')

    <!-- Exibição dos dados da categoria -->
    <div class="card">
        <div class="card-body">
            <!-- ID da categoria -->
            <p><strong>ID:</strong> {{ $categoria->id }}</p>

            <!-- Nome da categoria -->
            <p><strong>Nome:</strong> {{ $categoria->nome }}</p>

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


    <!-- Lista de Atividades -->
    <div class="mt-4">
        <h4>Atividades Relacionadas</h4>
        @if ($categoria->atividades->isNotEmpty())
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data da Atividade</th>
                        <th>Hora de Início</th>
                        <th>Hora de Fim</th>
                        <th>Descrição</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categoria->atividades as $atividade)
                        <tr>
                            <td>{{ $atividade->id }}</td>
                            <td>{{ $atividade->data_atividade->format('d/m/Y') }}</td>
                            <td>{{ $atividade->hora_inicio }}</td>
                            <td>{{ $atividade->hora_fim }}</td>
                            <td>{{ $atividade->descricao }}</td>
                            <td>{{ ucfirst($atividade->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Nenhuma atividade relacionada a esta categoria.</p>
        @endif
    </div>


@endsection