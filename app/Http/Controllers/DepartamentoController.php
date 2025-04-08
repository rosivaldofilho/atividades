<?php

namespace App\Http\Controllers;

use App\Models\Departamento; // Importa o modelo Departamento
use Illuminate\Http\Request; // Importa a classe Request para manipular dados de entrada

class DepartamentoController extends Controller
{
    /**
     * Exibe uma lista de todos os departamentos.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Recupera todos os departamentos do banco de dados
        $departamentos = Departamento::all();

        // Retorna a view 'index' com os dados dos departamentos
        return view('departamentos.index', compact('departamentos'));
    }

    /**
     * Mostra o formulário para criar um novo departamento.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Retorna a view 'create' para exibir o formulário de criação
        return view('departamentos.create');
    }

    /**
     * Armazena um novo departamento no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valida os dados do formulário
        $validated = $request->validate([
            'nome' => 'required|string|max:255', // O nome é obrigatório e deve ser uma string de até 255 caracteres
        ]);

        // Cria um novo departamento no banco de dados com os dados validados
        Departamento::create($validated);

        // Redireciona para a lista de departamentos com uma mensagem de sucesso
        return redirect()->route('departamentos.index')->with('success', 'Departamento criado com sucesso!');
    }

    /**
     * Exibe os detalhes de um departamento específico.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\View\View
     */
    public function show(Departamento $departamento)
    {
        // Retorna a view 'show' com os dados do departamento selecionado
        return view('departamentos.show', compact('departamento'));
    }

    /**
     * Mostra o formulário para editar um departamento existente.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\View\View
     */
    public function edit(Departamento $departamento)
    {
        // Retorna a view 'edit' com os dados do departamento selecionado
        return view('departamentos.edit', compact('departamento'));
    }

    /**
     * Atualiza um departamento existente no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Departamento $departamento)
    {
        // Valida os dados do formulário
        $validated = $request->validate([
            'nome' => 'required|string|max:255', // O nome é obrigatório e deve ser uma string de até 255 caracteres
        ]);

        // Atualiza o departamento no banco de dados com os dados validados
        $departamento->update($validated);

        // Redireciona para a lista de departamentos com uma mensagem de sucesso
        return redirect()->route('departamentos.index')->with('success', 'Departamento atualizado com sucesso!');
    }

    /**
     * Remove um departamento do banco de dados.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Departamento $departamento)
    {
        // Exclui o departamento do banco de dados
        $departamento->delete();

        // Redireciona para a lista de departamentos com uma mensagem de sucesso
        return redirect()->route('departamentos.index')->with('success', 'Departamento excluído com sucesso!');
    }
}