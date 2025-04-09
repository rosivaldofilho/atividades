<!-- resources/views/departamentos/create.blade.php -->

<!-- Extende o layout principal (caso você tenha um layout base) -->
@extends('layouts.app')

@section('title')
    <span>Criar Novo Departamento</span>
@endsection

@section('content')
    <!-- Container principal -->
    <div class="container">

        <!-- Formulário para criar um novo departamento -->
        <form action="{{ route('departamentos.store') }}" method="POST">
            <!-- Token CSRF para proteção contra ataques CSRF -->
            @csrf

            <!-- Campo do nome do departamento -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Ex: Recursos Humanos" required>
                <!-- Mensagem de erro caso a validação falhe -->
                @error('nome')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botões de ação -->
            <div class="mb-3">
                <!-- Botão para enviar o formulário -->
                <button type="submit" class="btn btn-primary">Salvar</button>

                <!-- Botão para voltar à lista de departamentos -->
                <a href="{{ route('departamentos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection