<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\CategoriaProduto;
use Illuminate\Validation\Rule;

class CategoriaProdutoController extends Controller
{
    public function index()
    {
        $categoriaprodutos = CategoriaProduto::query()
            ->with(['categoria', 'produto'])
            ->latest()
            ->get();

        return view('categoriaprodutos.index', compact('categoriaprodutos'));
    }

    public function create()
    {
        return view('categoriaprodutos.create', $this->formOptions());
    }

    public function store(Request $request)
    {
        $dados = $this->validateCategoriaProduto($request);

        CategoriaProduto::create($dados);

        return redirect()
            ->route('categoriaprodutos.index')
            ->with('success', 'Categoria de produto criada com sucesso.');
    }

    public function edit(CategoriaProduto $categoriaproduto)
    {
        return view('categoriaprodutos.edit', [
            'categoriaproduto' => $categoriaproduto,
            ...$this->formOptions(),
        ]);
    }

    public function update(Request $request, CategoriaProduto $categoriaproduto)
    {
        $dados = $this->validateCategoriaProduto($request, $categoriaproduto);

        $categoriaproduto->update($dados);

        return redirect()
            ->route('categoriaprodutos.index')
            ->with('success', 'Categoria do produto atualizada com sucesso.');
    }

    public function destroy(CategoriaProduto $categoriaproduto)
    {
        $categoriaproduto->delete();

        return redirect()
            ->route('categoriaprodutos.index')
            ->with('success', 'Categoria do produto removida com sucesso.');
    }

    private function formOptions(): array
    {
        return [
            'categoria' => Categoria::query()->orderBy('nome')->get(),
            'produto' => Produto::query()->orderBy('nome')->get(),
        ];
    }

    private function validateCategoriaProduto(Request $request, ?CategoriaProduto $categoriaproduto = null): array
    {
        return $request->validate(
            [
                'categoria_id' => ['required', 'exists:categoria,id'],
                'produto_id' => ['required', 'exists:produto,id'],
            ],
            [
                'categoria_id.required' => 'Selecione uma categoria.',
                'categoria_id.exists' => 'A categoria selecionado nao foi encontrado.',
                'produto_id.required' => 'Selecione um produto.',
                'produto_id.exists' => 'O produto selecionado nao foi encontrado.',
            ]
        );
    }
}