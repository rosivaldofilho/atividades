<!-- resources/views/categorias/index.blade.php -->

<!-- Extensão do layout principal (se você estiver usando um layout base) -->
@extends('layouts.app')

@section('title')
    <h2 style="margin-bottom: 0;">Categorias</h2>
@endsection

@section('content')

    <!-- Botão para criar uma nova categoria -->
    <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3">
        Criar Nova Categoria
    </a>

    <!-- Verifica se há categorias registradas -->
    @if ($categorias->isEmpty())
        <!-- Mensagem caso não haja categorias -->
        <p>Nenhuma categoria cadastrada.</p>
    @else
        <!-- Tabela para exibir as categorias -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <!-- Cabeçalhos da tabela -->
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop para iterar sobre as categorias -->
                @foreach ($categorias as $categoria)
                    <tr>
                        <!-- Exibe o ID da categoria -->
                        <td>{{ $categoria->id }}</td>

                        <!-- Exibe a descrição da categoria -->
                        <td>{{ $categoria->descricao }}</td>

                        <!-- Coluna de ações (editar e excluir) -->
                        <td>
                            <!-- Link para editar a categoria -->
                            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-warning">
                                Editar
                            </a>

                            <!-- Formulário para excluir a categoria -->
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection