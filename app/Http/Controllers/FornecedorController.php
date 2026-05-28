<?php

namespace App\Http\Controllers;
use App\Models\Fornecedor;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::query()
            ->latest()
            ->get();

        return view('fornecedor.index', compact('fornecedores'));
    }

    public function create()
    {
        return view('fornecedor.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'telefone' => ['required', 'int'],
            'endereco' => ['required', 'string', 'max: 255']
        ]);

        Fornecedor::create($dados);

        return redirect()
            ->route('fornecedor.index')
            ->with('success', 'Fornecedor criado com sucesso.');
    }

    public function edit(Fornecedor $fornecedor)
    {
        return view('fornecedor.edit', compact('fornecedor'));
    }

    public function update(Request $request, Fornecedor $fornecedor)
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'telefone' => ['required', 'int', 'max: 20'],
            'endereco' => ['required', 'string', 'max: 255']
    
        ]);

        $fornecedor->update($dados);

        return redirect()
            ->route('fornecedor.index')
            ->with('success', 'Fornecedor atualizado com sucesso.');
    }

    public function destroy(Fornecedor $fornecedor)
    {
        $fornecedor->delete();

        return redirect()
            ->route('fornecedor.index')
            ->with('success', 'Fornecedor removido com sucesso.');
    }
}
