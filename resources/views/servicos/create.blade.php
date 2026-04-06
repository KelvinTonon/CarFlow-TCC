<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Cadastrar Serviço
        </h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('servicos.store') }}" method="POST" class="max-w-lg">
            @csrf

            <!-- Nome -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Nome do Serviço</label>
                <input type="text" name="nome_servico" required
                    class="w-full border rounded p-2"
                    placeholder="Ex: Lavagem completa">
            </div>

            <!-- Descrição -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Descrição</label>
                <textarea name="descricao"
                    class="w-full border rounded p-2"
                    placeholder="Descreva o serviço"></textarea>
            </div>

            <!-- Preço -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Preço (R$)</label>
                <input type="number" name="preco" step="0.01" required
                    class="w-full border rounded p-2"
                    placeholder="Ex: 50.00">
            </div>

            <!-- Duração -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Duração (minutos)</label>
                <input type="number" name="duracao_estimada" required
                    class="w-full border rounded p-2"
                    placeholder="Ex: 60">
            </div>

            <!-- Botão -->
            <button
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Salvar
            </button>

            <!-- Voltar -->
            <a href="{{ route('servicos.index') }}"
               class="ml-4 text-gray-600 hover:underline">
                ← Voltar
            </a>

        </form>

    </div>
</x-app-layout>