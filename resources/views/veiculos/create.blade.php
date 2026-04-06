<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Cadastrar Veículo
        </h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('veiculos.store') }}" method="POST" class="max-w-lg">
            @csrf

            <!-- Cliente -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Cliente</label>
                <select name="cliente_id" required
                    class="w-full border rounded p-2">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">
                            {{ $cliente->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Modelo -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Modelo</label>
                <input type="text" name="modelo" required
                    class="w-full border rounded p-2"
                    placeholder="Ex: Gol, Civic, Corolla">
            </div>

            <!-- Marca -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Marca</label>
                <input type="text" name="marca" required
                    class="w-full border rounded p-2"
                    placeholder="Ex: Volkswagen, Honda">
            </div>

            <!-- Placa -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Placa</label>
                <input type="text" name="placa" required
                    class="w-full border rounded p-2"
                    placeholder="ABC-1234">
            </div>

            <!-- Cor -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Cor</label>
                <input type="text" name="cor" required
                    class="w-full border rounded p-2"
                    placeholder="Ex: Preto, Branco">
            </div>

            <!-- Botão -->
            <button
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Salvar
            </button>

            <!-- Voltar -->
            <a href="{{ route('veiculos.index') }}"
               class="ml-4 text-gray-600 hover:underline">
                ← Voltar
            </a>

        </form>

    </div>
</x-app-layout>