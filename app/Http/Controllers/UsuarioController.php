<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Departamento;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Exibe uma lista de todos os usuários.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Define o termo de busca
        $searchTerm = $request->input('search', '');

        // Carrega as usuarios com filtro e paginação
        $usuarios = Usuario::porNome($searchTerm)
                               ->orWhereHas('departamento', function ($query) use ($searchTerm) {
                                   $query->whereRaw("REPLACE(LOWER(nome), ' ', '') LIKE ?", ["%{$searchTerm}%"]);
                               })
                               ->with('departamento')
                               ->paginate(6);

        // Passa o termo de busca para a view
        return view('usuarios.index', compact('usuarios', 'searchTerm'));
    }

    /**
     * Mostra o formulário para criar um novo usuário.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Recupera todos os departamentos para preencher o campo de seleção no formulário
        $departamentos = Departamento::all();

        // Retorna a view 'create' com os departamentos
        return view('usuarios.create', compact('departamentos'));
    }

    /**
     * Armazena um novo usuário no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valida os dados recebidos do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'departamento_id' => 'required|exists:departamentos,id', // Verifica se o departamento existe
        ]);

        // Cria um novo usuário no banco de dados
        Usuario::create($request->all());

        // Redireciona para a lista de usuários com mensagem de sucesso
        return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso.');
    }

    /**
     * Exibe os detalhes de um usuário específico.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\View\View
     */
    public function show(Usuario $usuario)
    {
        // Retorna a view 'show' com os detalhes do usuário
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Mostra o formulário para editar um usuário existente.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\View\View
     */
    public function edit(Usuario $usuario)
    {
        // Recupera todos os departamentos para preencher o campo de seleção no formulário
        $departamentos = Departamento::all();

        // Retorna a view 'edit' com os dados do usuário e os departamentos
        return view('usuarios.edit', compact('usuario', 'departamentos'));
    }

    /**
     * Atualiza um usuário existente no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Usuario $usuario)
    {
        // Valida os dados recebidos do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'departamento_id' => 'required|exists:departamentos,id', // Verifica se o departamento existe
        ]);

        // Atualiza os dados do usuário no banco de dados
        $usuario->update($request->all());

        // Redireciona para a lista de usuários com mensagem de sucesso
        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso.');
    }

    /**
     * Remove um usuário do banco de dados.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Usuario $usuario)
    {
        // Exclui o usuário do banco de dados
        $usuario->delete();

        // Redireciona para a lista de usuários com mensagem de sucesso
        return redirect()->route('usuarios.index')->with('success', 'Usuário excluído com sucesso.');
    }
}