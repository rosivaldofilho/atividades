<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use App\Models\Categoria;
use App\Models\Usuario;
use App\Models\Departamento;
use Illuminate\Http\Request;

class AtividadeController extends Controller
{
    /**
     * Exibe uma lista de todas as atividades.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Recupera todas as atividades do banco de dados
        $atividades = Atividade::with(['categoria', 'usuario', 'departamento'])->get();

        // Retorna a view 'index' com as atividades
        return view('atividades.index', compact('atividades'));
    }

    /**
     * Mostra o formulário para criar uma nova atividade.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $atividade = new Atividade();
        // Recupera todos os departamentos, usuários e categorias para preencher os campos de seleção no formulário
        $departamentos = Departamento::all();
        $usuarios = Usuario::all();
        $categorias = Categoria::all();

        // Retorna a view 'create' com os dados necessários
        return view('atividades.create', compact('atividade','departamentos', 'usuarios', 'categorias'));
    }

    /**
     * Armazena uma nova atividade no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valida os dados recebidos do formulário
        $request->validate([
            'data_atividade' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fim' => 'required|after:hora_inicio',
            'descricao' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'departamento_id' => 'required|exists:departamentos,id',
            'status' => 'required|in:Concluído,Em andamento,Agendado,Aguardando,Cancelado',
            'observacao' => 'nullable|string',
        ]);

        // Cria uma nova atividade no banco de dados
        Atividade::create($request->all());

        // Redireciona para a lista de atividades com mensagem de sucesso
        return redirect()->route('atividades.index')->with('success', 'Atividade criada com sucesso.');
    }

    /**
     * Exibe os detalhes de uma atividade específica.
     *
     * @param  \App\Models\Atividade  $atividade
     * @return \Illuminate\View\View
     */
    public function show(Atividade $atividade)
    {
        // Carrega os relacionamentos necessários (categoria, usuário, departamento)
        $atividade->load(['categoria', 'usuario', 'departamento']);

        // Retorna a view 'show' com os detalhes da atividade
        return view('atividades.show', compact('atividade'));
    }

    /**
     * Mostra o formulário para editar uma atividade existente.
     *
     * @param  \App\Models\Atividade  $atividade
     * @return \Illuminate\View\View
     */
    public function edit(Atividade $atividade)
    {
        // Recupera todos os departamentos, usuários e categorias para preencher os campos de seleção no formulário
        $departamentos = Departamento::all();
        $usuarios = Usuario::all();
        $categorias = Categoria::all();

        // Retorna a view 'edit' com os dados da atividade e os dados necessários
        return view('atividades.edit', compact('atividade', 'departamentos', 'usuarios', 'categorias'));
    }

    /**
     * Atualiza uma atividade existente no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Atividade  $atividade
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Atividade $atividade)
    {
        // Valida os dados recebidos do formulário
        $request->validate([
            'data_atividade' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fim' => 'required|after:hora_inicio',
            'descricao' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'departamento_id' => 'required|exists:departamentos,id',
            'status' => 'required|in:Concluído,Em andamento,Agendado,Aguardando,Cancelado',
            'observacao' => 'nullable|string',
        ]);

        // Atualiza os dados da atividade no banco de dados
        $atividade->update($request->all());

        // Redireciona para a lista de atividades com mensagem de sucesso
        return redirect()->route('atividades.index')->with('success', 'Atividade atualizada com sucesso.');
    }

    /**
     * Remove uma atividade do banco de dados.
     *
     * @param  \App\Models\Atividade  $atividade
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Atividade $atividade)
    {
        // Exclui a atividade do banco de dados
        $atividade->delete();

        // Redireciona para a lista de atividades com mensagem de sucesso
        return redirect()->route('atividades.index')->with('success', 'Atividade excluída com sucesso.');
    }
}