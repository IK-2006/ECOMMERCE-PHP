<x-crud.page title="Nova matricula" description="Escolha a categoria e o produto para criar o vinculo.">
    <form action="{{ route('categoriaprodutos.store') }}" method="POST" class="grid max-w-2xl gap-5">
        @include('categoriaprodutos._form', ['buttonText' => 'Criar Categoria do Produto'])
    </form>
</x-crud.page>