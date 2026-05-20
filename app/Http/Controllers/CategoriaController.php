<?php

namespace App\Http\Controllers;
use App\Models\Categoria;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::query()
            ->latest()
            ->get();

        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
        ]);

        Categoria::create($dados);

        return redirect()
            ->route('categorias.index')
            ->with('success', 'Curso criado com sucesso.');
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
    
        ]);

        $categoria->update($dados);

        return redirect()
            ->route('categorias.index')
            ->with('success', 'Curso atualizado com sucesso.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()
            ->route('categorias.index')
            ->with('success', 'Curso removido com sucesso.');
    }
}
