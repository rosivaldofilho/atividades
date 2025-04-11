<!-- resources/views/categorias/index.blade.php -->

<!-- Extensão do layout principal (se você estiver usando um layout base) -->
@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript: void(0)">Categorias</a></li>
    <li class="breadcrumb-item" aria-current="page">Lista de categorias</li>
@endsection

@section('title')
    <span>Categorias</span>
@endsection

@section('content')




    <div class="card table-card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <!-- Botão para criar uma nova categoria -->
            <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3">
                Criar Nova Categoria
            </a>

            <!-- Formulário de Pesquisa -->
            <form action="{{ route('categorias.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Buscar usuário..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>

        </div>
        <div class="card-body">

            <!-- Verifica se há categorias registradas -->
            @if ($categorias->isEmpty())
                <div class="row m-3">
                    <!-- Mensagem caso não haja categorias -->
                    <p>Nenhuma categoria cadastrada.</p>
                </div>
            @else

                <div class="table-responsive">
                    <!-- Tabela para exibir as categorias -->
                    <table class="table table-hover datatable-table table-striped">
                        <thead>
                            <tr>
                                <!-- Cabeçalhos da tabela -->
                                <th>ID</th>
                                <th>Nome</th>
                                <th style="width: 22em">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop para iterar sobre as categorias -->
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <!-- Exibe o ID da categoria -->
                                    <td>{{ $categoria->id }}</td>

                                    <!-- Exibe o nome da categoria -->
                                    <td>{{ $categoria->nome }}</td>

                                    <!-- Coluna de ações (editar e excluir) -->
                                    <td>
                                        <!-- Botão para ir para a página de detalhes -->
                                        <a href="{{ route('categorias.show', $categoria->id) }}"
                                            class="btn btn-sm btn-primary">
                                            Ver Detalhes
                                        </a>

                                        <!-- Link para editar a categoria -->
                                        <a href="{{ route('categorias.edit', $categoria->id) }}"
                                            class="btn btn-sm btn-warning">
                                            Editar
                                        </a>

                                        <!-- Formulário para excluir a categoria -->
                                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">
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
                    {{ $categorias->links() }}

                </div>
        </div>
    </div>
    @endif
@endsection
