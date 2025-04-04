<!-- resources/views/departamentos/index.blade.php -->

<!-- Extende o layout principal (caso você tenha um layout base) -->
@extends('layouts.app')

@section('content')
    <!-- Container principal -->
    <div class="container">
        <!-- Título da página -->
        <h1 class="mt-4">Departamentos</h1>

        <!-- Botão para criar um novo departamento -->
        <a href="{{ route('departamentos.create') }}" class="btn btn-primary mb-3">
            Novo Departamento
        </a>

        <!-- Verifica se existem departamentos cadastrados -->
        @if ($departamentos->isEmpty())
            <p>Nenhum departamento cadastrado.</p>
        @else
            <!-- Tabela para exibir os departamentos -->
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop para exibir cada departamento -->
                    @foreach ($departamentos as $departamento)
                        <tr>
                            <!-- Exibe o ID do departamento -->
                            <td>{{ $departamento->id }}</td>

                            <!-- Exibe a descrição do departamento -->
                            <td>{{ $departamento->descricao }}</td>

                            <!-- Coluna de ações (editar e excluir) -->
                            <td>
                                <!-- Botão para editar o departamento -->
                                <a href="{{ route('departamentos.edit', $departamento->id) }}" class="btn btn-sm btn-warning">
                                    Editar
                                </a>

                                <!-- Formulário para excluir o departamento -->
                                <form action="{{ route('departamentos.destroy', $departamento->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este departamento?')">
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
@endsection