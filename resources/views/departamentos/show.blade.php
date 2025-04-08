<!-- resources/views/departamentos/show.blade.php -->

<!-- Extende o layout principal (caso você tenha um layout base) -->
@extends('layouts.app')

@section('title')
    <h2 style="margin-bottom: 0;">Detalhes do Departamento</h2>
@endsection

@section('content')
    <!-- Container principal -->
    <div class="container">

        <!-- Exibição dos dados do departamento -->
        <div class="card">
            <div class="card-body">
                <!-- ID do departamento -->
                <p><strong>ID:</strong> {{ $departamento->id }}</p>

                <!-- Nome do departamento -->
                <p><strong>Nome:</strong> {{ $departamento->nome }}</p>

                <!-- Data de criação -->
                <p><strong>Criado em:</strong> {{ $departamento->created_at->format('d/m/Y H:i') }}</p>

                <!-- Data de atualização -->
                <p><strong>Atualizado em:</strong> {{ $departamento->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <!-- Botões de ação -->
        <div class="mt-3">
            <!-- Botão para editar o departamento -->
            <a href="{{ route('departamentos.edit', $departamento->id) }}" class="btn btn-warning">
                Editar
            </a>

            <!-- Formulário para excluir o departamento -->
            <form action="{{ route('departamentos.destroy', $departamento->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este departamento?')">
                    Excluir
                </button>
            </form>

            <!-- Botão para voltar à lista de departamentos -->
            <a href="{{ route('departamentos.index') }}" class="btn btn-secondary">
                Voltar
            </a>
        </div>


        <!-- Lista de Atividades -->
        <div class="mt-4">
            <h4>Atividades Relacionadas</h4>
            @if ($departamento->atividades->isNotEmpty())
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
                        @foreach ($departamento->atividades as $atividade)
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
                <p>Nenhuma atividade relacionada a este departamento.</p>
            @endif
        </div>

    </div>
@endsection