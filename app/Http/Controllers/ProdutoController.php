<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Fornecedor;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProdutoController extends Controller
{
    public function index()
    {
        $produto = Produto::query()
            ->with(['fornecedor'])
            ->latest()
            ->get();

        return view('produto.index', compact('produto'));
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
            ->route('produtos.index')
            ->with('success', 'produto removida com sucesso.');
    }

    private function formOptions(): array
    {
        return [
            'fornecedor' => Aluno::query()->orderBy('nome')->get(),
        ];
    }

    private function validateproduto(Request $request, ?Produto $produto = null): array
    {
        return $request->validate(
            [
                'fornecedor' => ['required', 'exists:fornecedor,id'],
                [
                    Rule::unique('produto')
                        ->where('fornecedor_id', $request->input('fornecedor_id'))
                        ->ignore($produto),
                ],
                'data_produto' => ['required', 'date'],
                'status' => ['required', 'in:ativa,trancada,concluida'],
            ],
            [
                'fornecedor_id.required' => 'Selecione um aluno.',
                'fornecedor_id.exists' => 'O aluno selecionado nao foi encontrado.',
                'curso_id.required' => 'Selecione um curso.',
                'curso_id.exists' => 'O curso selecionado nao foi encontrado.',
                'disciplina_id.required' => 'Selecione uma disciplina.',
                'disciplina_id.exists' => 'A disciplina selecionada nao foi encontrada.',
                'disciplina_id.unique' => 'Este aluno ja esta produtodo nesta disciplina para este curso.',
                'data_produto.required' => 'Informe a data da produto.',
                'data_produto.date' => 'Informe uma data de produto valida.',
                'status.required' => 'Selecione o status.',
                'status.in' => 'O status selecionado e invalido.',
            ]
        );
    }
}