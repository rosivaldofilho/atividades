<!-- resources/views/atividades/index.blade.php -->

<!-- Extensão do layout principal (se você estiver usando um layout base) -->
@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript: void(0)">Atividades</a></li>
    <li class="breadcrumb-item" aria-current="page">Lista de atividades</li>
@endsection

@section('title')
    <!-- Título da página -->
    <span>Atividades</span>
@endsection

@section('content')



    <div class="card table-card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <!-- Botão para criar uma nova atividade -->
            <a href="{{ route('atividades.create') }}" class="btn btn-primary mb-3">
                Criar Nova Atividade
            </a>
            <!-- Formulário de Pesquisa -->
            <form action="{{ route('atividades.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Buscar atividade..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
        <div class="card-body">
            <!-- Verifica se há atividades registradas -->
            @if ($atividades->isEmpty())
                <div class="row m-3">
                    <!-- Mensagem caso não haja atividades -->
                    <p>Nenhuma atividade encontrada.</p>
                </div>
            @else
                <div class="table-responsive">
                    <!-- Tabela para exibir as atividades -->
                    <table class="table table-hover datatable-table table-striped">
                        <thead>
                            <tr>
                                <!-- Cabeçalhos da tabela -->
                                <th>ID</th>
                                <th>Data</th>
                                <th>Hora Início</th>
                                <th>Hora Fim</th>
                                <th>Descrição</th>
                                <th>Categoria</th>
                                <th>Usuário</th>
                                <th>Departamento</th>
                                <th>Status</th>
                                <th style="width: 22em">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop para iterar sobre as atividades -->
                            @foreach ($atividades as $atividade)
                                <tr>
                                    <!-- Exibe o ID da atividade -->
                                    <td>{{ $atividade->id }}</td>

                                    <!-- Exibe a data da atividade -->
                                    <td>{{ $atividade->data_atividade->format('d/m/Y') }}</td>

                                    <!-- Exibe a hora de início -->
                                    <td>{{ $atividade->hora_inicio }}</td>

                                    <!-- Exibe a hora de término -->
                                    <td>{{ $atividade->hora_fim }}</td>

                                    <!-- Exibe a descrição da atividade -->
                                    <td>{{ $atividade->descricao }}</td>

                                    <!-- Exibe a categoria associada -->
                                    <td>{{ $atividade->categoria->nome ?? 'Sem Categoria' }}</td>

                                    <!-- Exibe o nome do usuário responsável -->
                                    <td style="width: 15em">{{ $atividade->usuario->nome ?? 'Sem Usuário' }}</td>

                                    <!-- Exibe o departamento associado -->
                                    <td>{{ $atividade->departamento->nome ?? 'Sem Departamento' }}</td>

                                    <!-- Exibe o status da atividade -->
                                    <td>{{ $atividade->status }}</td>

                                    <!-- Coluna de ações (editar e excluir) -->
                                    <td>

                                        <!-- Botão para ir para a página de detalhes -->
                                        <a href="{{ route('atividades.show', $atividade->id) }}"
                                            class="btn btn-sm btn-primary">
                                            Ver Detalhes
                                        </a>

                                        <!-- Link para editar a atividade -->
                                        <a href="{{ route('atividades.edit', $atividade->id) }}"
                                            class="btn btn-sm btn-warning">
                                            Editar
                                        </a>

                                        <!-- Formulário para excluir a atividade -->
                                        <form action="{{ route('atividades.destroy', $atividade->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Tem certeza que deseja excluir esta atividade?')">
                                                Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            @endif
        </div>
        <div class="text-end m-3">

            <!-- Link para paginação -->
            {{ $atividades->links() }}

        </div>
    </div>
    </div>

@endsection
