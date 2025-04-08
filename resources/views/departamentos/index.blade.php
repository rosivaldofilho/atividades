<!-- resources/views/departamentos/index.blade.php -->

<!-- Extende o layout principal (caso você tenha um layout base) -->
@extends('layouts.app')

@section('title')
    <h2 style="margin-bottom: 0;">Departamentos</h2>
@endsection

@section('content')
    <!-- Container principal -->
    <div class="container">

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
                        <th>Nome</th>
                        <th>Ações</th>
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