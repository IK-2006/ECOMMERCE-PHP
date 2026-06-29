<?php

namespace App\Http\Controllers;
use App\Models\Categoria;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categoria = Categoria::query()
            ->latest()
            ->get();

        return view('categoria.index', compact('categoria'));
    }

    public function create()
    {
        return view('categoria.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
        ]);

        Categoria::create($dados);

        return redirect()
            ->route('categoria.index')
            ->with('success', 'Curso criado com sucesso.');
    }

    public function edit(Categoria $categoria)
    {
        return view('categoria.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
    
        ]);

        $categoria->update($dados);

        return redirect()
            ->route('categoria.index')
            ->with('success', 'Categoria atualizado com sucesso.');
    }

   public function destroy(Categoria $categoria)
    {
    $categoria->produtos()->detach();

    $categoria->delete();

    return redirect()
        ->route('categoria.index')
        ->with('success', 'Categoria removida com sucesso.');
    }

    
}
