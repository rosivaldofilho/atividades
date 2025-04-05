<!-- resources/views/atividades/create.blade.php -->

<!-- Extensão do layout principal (se você estiver usando um layout base) -->
@extends('layouts.app')

@section('title')
    <!-- Título da página -->
    <h2 style="margin-bottom: 0;">Criar Nova Atividade</h2>
@endsection

@section('content')
    
    <!-- Formulário para criar uma nova atividade -->
    <form action="{{ route('atividades.store') }}" method="POST">
        <!-- Token CSRF para proteção contra ataques CSRF -->
        @csrf

        <!-- Linha com Data, Hora de Início e Hora de Término -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="data_atividade" class="form-label">Data da Atividade</label>
                <input type="date" name="data_atividade" id="data_atividade" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="hora_inicio" class="form-label">Hora de Início</label>
                <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="hora_termino" class="form-label">Hora de Término</label>
                <input type="time" name="hora_termino" id="hora_termino" class="form-control" required>
            </div>
            
        </div>

        <!-- Campo para a descrição da atividade -->
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="3" required>{{ old('descricao') }}</textarea>
            <!-- Mensagem de erro caso a validação falhe -->
            @error('descricao')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo para selecionar a categoria -->
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select name="categoria_id" id="categoria_id" class="form-select" required>
                <option value="">Selecione uma Categoria</option>
                <!-- Loop para iterar sobre as categorias disponíveis -->
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->descricao }}
                    </option>
                @endforeach
            </select>
            <!-- Mensagem de erro caso a validação falhe -->
            @error('categoria_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo para selecionar o usuário -->
        <div class="mb-3">
            <label for="usuario_id" class="form-label">Usuário</label>
            <select name="usuario_id" id="usuario_id" class="form-select" required>
                <option value="">Selecione um Usuário</option>
                <!-- Loop para iterar sobre os usuários disponíveis -->
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ old('usuario_id') == $usuario->id ? 'selected' : '' }}>
                        {{ $usuario->nome }}
                    </option>
                @endforeach
            </select>
            <!-- Mensagem de erro caso a validação falhe -->
            @error('usuario_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo para selecionar o departamento -->
        <div class="mb-3">
            <label for="departamento_id" class="form-label">Departamento</label>
            <select name="departamento_id" id="departamento_id" class="form-select" required>
                <option value="">Selecione um Departamento</option>
                <!-- Loop para iterar sobre os departamentos disponíveis -->
                @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}" {{ old('departamento_id') == $departamento->id ? 'selected' : '' }}>
                        {{ $departamento->descricao }}
                    </option>
                @endforeach
            </select>
            <!-- Mensagem de erro caso a validação falhe -->
            @error('departamento_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo para selecionar o status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="">Selecione um Status</option>
                <option value="Concluído" {{ old('status') == 'Concluído' ? 'selected' : '' }}>Concluído</option>
                <option value="Em andamento" {{ old('status') == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
                <option value="Agendado" {{ old('status') == 'Agendado' ? 'selected' : '' }}>Agendado</option>
                <option value="Aguardando" {{ old('status') == 'Aguardando' ? 'selected' : '' }}>Aguardando</option>
                <option value="Cancelado" {{ old('status') == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
            </select>
            <!-- Mensagem de erro caso a validação falhe -->
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo para observações -->
        <div class="mb-3">
            <label for="observacao" class="form-label">Observação</label>
            <textarea name="observacao" id="observacao" class="form-control" rows="3">{{ old('observacao') }}</textarea>
            <!-- Mensagem de erro caso a validação falhe -->
            @error('observacao')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Botões de envio e cancelamento -->
        <div class="mb-3">
            <!-- Botão para enviar o formulário -->
            <button type="submit" class="btn btn-primary">Salvar</button>

            <!-- Link para voltar à lista de atividades -->
            <a href="{{ route('atividades.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@endsection