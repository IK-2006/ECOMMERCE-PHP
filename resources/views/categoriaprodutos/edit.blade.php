<x-crud.page title="Editar cateogiraproduto" description="Atualize os dados do vinculo selecionado.">
    <form action="{{ route('categoriaprodutos.update', $categoriaproduto) }}" method="POST" class="grid max-w-2xl gap-5">
        @method('PUT')
        @include('categoriaprodutos._form', ['buttonText' => 'Salvar alteracoes'])
    </form>
</x-crud.page>