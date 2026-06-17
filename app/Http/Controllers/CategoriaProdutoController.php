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
        $produtos = Produto::all();
        $categorias = Categoria::all();

        return view('categoriaprodutos.create', compact('produtos', 'categorias'));
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
        'categorias' => Categoria::query()->orderBy('nome')->get(),
        'produtos' => Produto::query()->orderBy('nome')->get(),
    ];
    }

   private function validateCategoriaProduto(Request $request, ?CategoriaProduto $categoriaproduto = null): array
    {
    return $request->validate(
        [
            'categoria_id' => ['required', 'exists:categorias,id'],
            'produto_id' => ['required', 'exists:produtos,id'],
        ],
        [
            'categoria_id.required' => 'Selecione uma categoria.',
            'categoria_id.exists' => 'A categoria selecionada não foi encontrada.',
            'produto_id.required' => 'Selecione um produto.',
            'produto_id.exists' => 'O produto selecionado não foi encontrado.',
        ]
    );
    }   
}