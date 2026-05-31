<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Http\Controllers\ProdutoController;
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class ProdutoController extends Controller
{
    public function index()
{
    // Mudamos de $produto para $produtos (plural)
    $produtos = Produto::query()
        ->with(['fornecedor'])
        ->latest()
        ->get();

    // Mudamos o compact para enviar 'produtos' (plural)
    return view('produto.index', compact('produtos'));
}

    public function create()
    {
        return view('produto.create', $this->formOptions());
    }

    public function store(Request $request)
    {
        $dados = $this->validateProduto($request);

        Produto::create($dados);

        return redirect()
            ->route('produto.index')
            ->with('success', 'Produto criada com sucesso.');
    }

    public function edit(Produto $produto)
    {
        return view('produto.edit', [
            'produto' => $produto,
            ...$this->formOptions(),
        ]);
    }

    public function update(Request $request, Produto $produto)
    {
        $dados = $this->validateProduto($request, $produto);

        $produto->update($dados);

        return redirect()
            ->route('produto.index')
            ->with('success', 'produto atualizada com sucesso.');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()
            ->route('produto.index')
            ->with('success', 'produto removida com sucesso.');
    }

    private function formOptions(): array
    {
        return [
            'fornecedor' => Fornecedor::query()->orderBy('nome')->get()
        
        ];
    }

   private function validateproduto(Request $request, ?Produto $produto = null): array
{
    return $request->validate(
        [
            'nome' => ['required', 'string', 'max:255'],
            'quantidade' => ['required', 'integer'],
            'preco' => ['required', 'numeric'],
            'marca' => ['required', 'string', 'max:255'],
            'tamanho' => ['required', 'string', 'max:255'],
            // Usando o padrão do Laravel (nome_id)
            'fornecedor_id' => ['required', 'exists:fornecedores,id'], 
        ],
        [
            'nome.required' => 'O nome do produto é obrigatório.',
            'preco.required' => 'Informe o preço.',
            'fornecedor_id.required' => 'Informe o ID do Fornecedor.',
            'fornecedor_id.exists' => 'Este Fornecedor não existe no banco de dados.',
        ]
    );
}
}