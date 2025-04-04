<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Exibe uma lista de todas as categorias.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Recupera todas as categorias do banco de dados
        $categorias = Categoria::all();

        // Retorna a view 'index' com as categorias
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Mostra o formulário para criar uma nova categoria.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Retorna a view 'create' para exibir o formulário de criação
        return view('categorias.create');
    }

    /**
     * Armazena uma nova categoria no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valida os dados recebidos do formulário
        $request->validate([
            'descricao' => 'required|string|max:255|unique:categorias',
        ]);

        // Cria uma nova categoria no banco de dados
        Categoria::create($request->all());

        // Redireciona para a lista de categorias com mensagem de sucesso
        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso.');
    }

    /**
     * Exibe os detalhes de uma categoria específica.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\View\View
     */
    public function show(Categoria $categoria)
    {
        // Retorna a view 'show' com os detalhes da categoria
        return view('categorias.show', compact('categoria'));
    }

    /**
     * Mostra o formulário para editar uma categoria existente.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\View\View
     */
    public function edit(Categoria $categoria)
    {
        // Retorna a view 'edit' com os dados da categoria para edição
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Atualiza uma categoria existente no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Categoria $categoria)
    {
        // Valida os dados recebidos do formulário
        $request->validate([
            'descricao' => 'required|string|max:255|unique:categorias,descricao,' . $categoria->id,
        ]);

        // Atualiza os dados da categoria no banco de dados
        $categoria->update($request->all());

        // Redireciona para a lista de categorias com mensagem de sucesso
        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso.');
    }

    /**
     * Remove uma categoria do banco de dados.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Categoria $categoria)
    {
        // Exclui a categoria do banco de dados
        $categoria->delete();

        // Redireciona para a lista de categorias com mensagem de sucesso
        return redirect()->route('categorias.index')->with('success', 'Categoria excluída com sucesso.');
    }
}