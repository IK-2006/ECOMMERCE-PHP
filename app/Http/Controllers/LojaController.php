<?php

// app/Http/Controllers/LojaController.php
namespace App\Http\Controllers;


use App\Models\Produto;
use Illuminate\Http\Request;

class LojaController extends Controller
{
    /**
     * Exibe a lista de produtos para o usuário final.
     */
    public function index()
    {
        $produtos = Produto::all(); // Ou use paginate(12) para paginação
        return view('userview.index', compact('produtos'));
    }

    /**
     * Adiciona um produto ao carrinho.
     */
    public function adicionarAoCarrinho(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
        ]);

        // Lógica para adicionar ao carrinho (usando sessão)
        $carrinho = session()->get('carrinho', []);
        $produtoId = $request->produto_id;
        $quantidade = $request->quantidade;

        // Se o produto já está no carrinho, soma a quantidade
        if (isset($carrinho[$produtoId])) {
            $carrinho[$produtoId] += $quantidade;
        } else {
            $carrinho[$produtoId] = $quantidade;
        }

        session()->put('carrinho', $carrinho);

        return redirect()->back()->with('success', 'Produto adicionado ao carrinho!');
    }

    /**
 * Exibe os itens do carrinho.
 */
public function carrinho()
{
    // Recupera o carrinho da sessão
    $carrinho = session()->get('carrinho', []);

    // Se o carrinho não estiver vazio, busca os produtos no banco
    $itens = collect();
    $total = 0;

    if (!empty($carrinho)) {
        // Pega todos os produtos cujos IDs estão no carrinho
        $produtos = Produto::whereIn('id', array_keys($carrinho))->get();

        // Monta a coleção de itens com as informações necessárias
        foreach ($produtos as $produto) {
            $quantidade = $carrinho[$produto->id];
            $subtotal = $produto->preco * $quantidade;
            $total += $subtotal;

            $itens->push([
                'produto' => $produto,
                'quantidade' => $quantidade,
                'subtotal' => $subtotal,
            ]);
        }
    }

    return view('userview.carrinho.index', compact('itens', 'total'));
}   
}   