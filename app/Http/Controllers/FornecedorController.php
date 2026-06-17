<?php

namespace App\Http\Controllers;
use App\Models\Produto;
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
            'nome' => ['required', 'string'],
            'telefone' => ['required', 'int'],
            'endereco' => ['required', 'string']
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
            'nome' => ['required', 'string'],
            'telefone' => ['required', 'int'],
            'endereco' => ['required', 'string']
    
        ]);

        $fornecedor->update($dados);

        return redirect()
            ->route('fornecedor.index')
            ->with('success', 'Fornecedor atualizado com sucesso.');
    }

    public function destroy(Fornecedor $fornecedor)
{
    $produtosVinculados = Produto::where('fornecedor_id', $fornecedor->id)->count();

    if ($produtosVinculados > 0) {
        return redirect()
            ->route('fornecedor.index')
            ->with('error', 'Não é possível excluir: existem produtos no catálogo vinculados a este fornecedor.');
    }

    $fornecedor->delete();

    return redirect()
        ->route('fornecedor.index')
        ->with('success', 'Fornecedor removido com sucesso.');
}
}
