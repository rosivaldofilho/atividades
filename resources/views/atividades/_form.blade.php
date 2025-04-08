<!-- resources/views/atividades/_form.blade.php -->

<div class="row mb-3">
    <!-- Campo Data da Atividade -->
    <div class="col-md-4">
        <label for="data_atividade" class="form-label">Data da Atividade</label>
        <input type="date" name="data_atividade" id="data_atividade" class="form-control" 
               value="{{ old('data_atividade', $atividade->data_atividade?->format('Y-m-d') ?? null) }}" required>
        @error('data_atividade')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Campo Hora de Início -->
    <div class="col-md-4">
        <label for="hora_inicio" class="form-label">Hora de Início</label>
        <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" 
               value="{{ old('hora_inicio', $atividade->hora_inicio ?? null) }}" required>
        @error('hora_inicio')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Campo Hora de Término -->
    <div class="col-md-4">
        <label for="hora_fim" class="form-label">Hora de Término</label>
        <input type="time" name="hora_fim" id="hora_fim" class="form-control" 
            value="{{ old('hora_fim', $atividade->hora_fim ?? null) }}" required>
        @error('hora_fim')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<!-- Campo Descrição -->
<div class="mb-3">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea name="descricao" id="descricao" class="form-control" rows="3" required>
        {{ old('descricao', $atividade->descricao ?? null) }}
    </textarea>
    @error('descricao')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Campo Usuário (Dropdown) -->
<div class="mb-3">
    <label for="usuario_id" class="form-label">Usuário</label>
    <select name="usuario_id" id="usuario_id" class="form-select" required>
        <option value="">Selecione um usuário</option>
        @foreach ($usuarios as $usuario)
            <option value="{{ $usuario->id }}" 
                {{ old('usuario_id', $atividade->usuario_id ?? null) == $usuario->id ? 'selected' : '' }}>
                {{ $usuario->nome }}
            </option>
        @endforeach
    </select>
    <!-- Mensagem de erro caso a validação falhe -->
    @error('usuario_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Categoria, Departamento e Status na Mesma Linha -->
<div class="row mb-3">
    

    <!-- Campo Departamento -->
    <div class="col-md-4">
        <label for="departamento_id" class="form-label">Departamento</label>
        <select name="departamento_id" id="departamento_id" class="form-select" required>
            <option value="">Selecione um departamento</option>
            @foreach ($departamentos as $departamento)
                <option value="{{ $departamento->id }}" 
                    {{ old('departamento_id', $atividade->departamento_id ?? null) == $departamento->id ? 'selected' : '' }}>
                    {{ $departamento->descricao }}
                </option>
            @endforeach
        </select>
        <!-- Mensagem de erro caso a validação falhe -->
        @error('departamento_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Campo Categoria -->
    <div class="col-md-4">
        <label for="categoria_id" class="form-label">Categoria</label>
        <select name="categoria_id" id="categoria_id" class="form-select" required>
            <option value="">Selecione uma categoria</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" 
                    {{ old('categoria_id', $atividade->categoria_id ?? null) == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->descricao }}
                </option>
            @endforeach
        </select>
        <!-- Mensagem de erro caso a validação falhe -->
        @error('categoria_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Campo Status -->
    <div class="col-md-4">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select" required>
            <option value="Concluído" {{ old('status', $atividade->status ?? null) == 'Concluído' ? 'selected' : '' }}>Concluído</option>
            <option value="Em andamento" {{ old('status', $atividade->status ?? null) == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
            <option value="Agendado" {{ old('status', $atividade->status ?? null) == 'Agendado' ? 'selected' : '' }}>Agendado</option>
            <option value="Aguardando" {{ old('status', $atividade->status ?? null) == 'Aguardando' ? 'selected' : '' }}>Aguardando</option>
            <option value="Cancelado" {{ old('status', $atividade->status ?? null) == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
        </select>
        <!-- Mensagem de erro caso a validação falhe -->
        @error('status')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>


<!-- Campo Observação -->
<div class="mb-3">
    <label for="observacao" class="form-label">Observação</label>
    <textarea name="observacao" id="observacao" class="form-control" rows="3">
        {{ old('observacao', $atividade->observacao ?? null) }}
    </textarea>
    <!-- Mensagem de erro caso a validação falhe -->
    @error('observacao')
    <div class="text-danger">{{ $message }}</div>
@enderror
</div>