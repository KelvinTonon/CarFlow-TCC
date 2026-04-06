<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Editar Serviço
        </h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('servicos.update', $servico->id) }}" 
              method="POST" 
              class="max-w-lg">
            @csrf
            @method('PUT')

            <!-- Nome -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Nome do Serviço</label>
                <input type="text" name="nome_servico" required
                    value="{{ $servico->nome_servico }}"
                    class="w-full border rounded p-2">
            </div>

            <!-- Descrição -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Descrição</label>
                <textarea name="descricao"
                    class="w-full border rounded p-2">{{ $servico->descricao }}</textarea>
            </div>

            <!-- Preço -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Preço (R$)</label>
                <input type="number" name="preco" step="0.01" required
                    value="{{ $servico->preco }}"
                    class="w-full border rounded p-2">
            </div>

            <!-- Duração -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Duração (minutos)</label>
                <input type="number" name="duracao_estimada" required
                    value="{{ $servico->duracao_estimada }}"
                    class="w-full border rounded p-2">
            </div>

            <!-- Botão -->
            <button
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Atualizar
            </button>

            <!-- Voltar -->
            <a href="{{ route('servicos.index') }}"
               class="ml-4 text-gray-600 hover:underline">
                ← Voltar
            </a>

        </form>

    </div>
</x-app-layout>