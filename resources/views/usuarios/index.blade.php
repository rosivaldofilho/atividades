<!-- resources/views/usuarios/index.blade.php -->

<!-- Extensão do layout principal (se você estiver usando um layout base) -->
@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript: void(0)">Usuários</a></li>
    <li class="breadcrumb-item" aria-current="page">Lista de usuários</li>
@endsection

@section('title')
    <span>Usuários</span>
@endsection

@section('content')









    <!-- Verifica se há usuários registrados -->
    @if ($usuarios->isEmpty())
        <!-- Mensagem caso não haja usuários -->
        <p>Nenhum usuário cadastrado.</p>
    @else
    <div class="dataTables_wrapper dt-bootstrap5">
        <div class="card table-card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <!-- Botão para criar um novo usuário -->
                <a href="{{ route('usuarios.create') }}" class="btn btn-primary m-3">
                    Criar Novo Usuário
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <!-- Tabela para exibir os usuários -->
                    <table class="table table-hover datatable-table  table-striped">
                        <thead>
                            <tr>
                                <!-- Cabeçalhos da tabela -->
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Departamento</th>
                                <th style="width: 22em">Ações</th>
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

                                        <!-- Botão para ir para a página de detalhes -->
                                        <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-sm btn-primary">
                                            Ver Detalhes
                                        </a>

                                        <!-- Link para editar o usuário -->
                                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-sm btn-warning">
                                            Editar
                                        </a>

                                        <!-- Formulário para excluir o usuário -->
                                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
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
                    {{ $usuarios->links() }}
    
                </div>
            </div>
        </div>
    </div>
    @endif

@endsection
