<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Cadastrar Cliente
        </h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('clientes.store') }}" method="POST" class="max-w-lg">
            @csrf

            <!-- Nome -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Nome</label>
                <input type="text" name="nome" required
                    class="w-full border rounded p-2"
                    placeholder="Digite o nome">
            </div>

            <!-- Telefone -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Telefone</label>
                <input type="text" name="telefone" required
                    class="w-full border rounded p-2"
                    placeholder="(00) 00000-0000">
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email"
                    class="w-full border rounded p-2"
                    placeholder="email@exemplo.com">
            </div>

            <!-- Endereço -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Endereço</label>
                <input type="text" name="endereco" required
                    class="w-full border rounded p-2"
                    placeholder="Rua, número, bairro">
            </div>

            <!-- Botão -->
            <button
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Salvar
            </button>

            <!-- Voltar -->
            <a href="{{ route('clientes.index') }}"
               class="ml-4 text-gray-600 hover:underline">
                ← Voltar
            </a>

        </form>

    </div>
</x-app-layout>