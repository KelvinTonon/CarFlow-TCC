<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Editar Cliente
        </h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('clientes.update', $cliente->id) }}" 
              method="POST" 
              class="max-w-lg">
            @csrf
            @method('PUT')

            <!-- Nome -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Nome</label>
                <input type="text" name="nome" required
                    value="{{ $cliente->nome }}"
                    class="w-full border rounded p-2">
            </div>

            <!-- Telefone -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Telefone</label>
                <input type="text" name="telefone" required
                    value="{{ $cliente->telefone }}"
                    class="w-full border rounded p-2">
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email"
                    value="{{ $cliente->email }}"
                    class="w-full border rounded p-2">
            </div>

            <!-- Endereço -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Endereço</label>
                <input type="text" name="endereco" required
                    value="{{ $cliente->endereco }}"
                    class="w-full border rounded p-2">
            </div>

            <!-- Botão -->
            <button
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Atualizar
            </button>

            <!-- Voltar -->
            <a href="{{ route('clientes.index') }}"
               class="ml-4 text-gray-600 hover:underline">
                ← Voltar
            </a>

        </form>

    </div>
</x-app-layout>