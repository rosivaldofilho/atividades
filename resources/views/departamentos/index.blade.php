<!-- resources/views/departamentos/index.blade.php -->

<!-- Extende o layout principal (caso você tenha um layout base) -->
@extends('layouts.app')


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript: void(0)">Departamentos</a></li>
    <li class="breadcrumb-item" aria-current="page">Lista de departamentos</li>
@endsection

@section('title')
    <span>Departamentos</span>
@endsection

@section('content')




    <div class="card table-card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <!-- Botão para criar um novo departamento -->
            <a href="{{ route('departamentos.create') }}" class="btn btn-primary mb-3">
                Novo Departamento
            </a>

            <!-- Formulário de Pesquisa -->
            <form action="{{ route('departamentos.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Buscar usuário..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>

        </div>
        <div class="card-body">

            <!-- Verifica se existem departamentos cadastrados -->
            @if ($departamentos->isEmpty())
                <div class="row m-3">
                    <p>Nenhum departamento encontrado.</p>
                </div>
            @else

                <div class="table-responsive">
                    <!-- Tabela para exibir os departamentos -->
                    <table class="table table-hover datatable-table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th style="width: 22em">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop para exibir cada departamento -->
                            @foreach ($departamentos as $departamento)
                                <tr>
                                    <!-- Exibe o ID do departamento -->
                                    <td>{{ $departamento->id }}</td>

                                    <!-- Exibe a nome do departamento -->
                                    <td>{{ $departamento->nome }}</td>

                                    <!-- Coluna de ações (editar e excluir) -->
                                    <td>
                                        <!-- Botão para ir para a página de detalhes -->
                                        <a href="{{ route('departamentos.show', $departamento->id) }}"
                                            class="btn btn-sm btn-primary">
                                            Ver Detalhes
                                        </a>
                                        <!-- Botão para editar o departamento -->
                                        <a href="{{ route('departamentos.edit', $departamento->id) }}"
                                            class="btn btn-sm btn-warning">
                                            Editar
                                        </a>

                                        <!-- Formulário para excluir o departamento -->
                                        <form action="{{ route('departamentos.destroy', $departamento->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Tem certeza que deseja excluir este departamento?')">
                                                Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-end m-3">

                    <!-- Link para paginação -->
                    {{ $departamentos->links() }}

                </div>
        </div>
    </div>
    @endif
@endsection
