<!-- resources/views/usuarios/index.blade.php -->

<!-- Extensão do layout principal (se você estiver usando um layout base) -->
@extends('layouts.app')

@section('title')
    <h2 style="margin-bottom: 0;">Usuários</h2>
@endsection

@section('content')

    <!-- Botão para criar um novo usuário -->
    <a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-3">
        Criar Novo Usuário
    </a>

    <!-- Verifica se há usuários registrados -->
    @if ($usuarios->isEmpty())
        <!-- Mensagem caso não haja usuários -->
        <p>Nenhum usuário cadastrado.</p>
    @else
        <!-- Tabela para exibir os usuários -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <!-- Cabeçalhos da tabela -->
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Departamento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop para iterar sobre os usuários -->
                @foreach ($usuarios as $usuario)
                    <tr>
                        <!-- Exibe o ID do usuário -->
                        <td>{{ $usuario->id }}</td>

                        <!-- Exibe o nome do usuário -->
                        <td>{{ $usuario->nome }}</td>

                        <!-- Exibe o nome do departamento associado ao usuário -->
                        <td>{{ $usuario->departamento->nome ?? 'Sem Departamento' }}</td>

                        <!-- Coluna de ações (editar e excluir) -->
                        <td>
                            <!-- Link para editar o usuário -->
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-sm btn-warning">
                                Editar
                            </a>

                            <!-- Formulário para excluir o usuário -->
                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
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