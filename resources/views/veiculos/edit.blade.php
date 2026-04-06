<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Editar Veículo
        </h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('veiculos.update', $veiculo->id) }}" 
              method="POST" 
              class="max-w-lg">
            @csrf
            @method('PUT')

            <!-- Cliente -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Cliente</label>
                <select name="cliente_id" required
                    class="w-full border rounded p-2">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}"
                            {{ $cliente->id == $veiculo->cliente_id ? 'selected' : '' }}>
                            {{ $cliente->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Modelo -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Modelo</label>
                <input type="text" name="modelo" required
                    value="{{ $veiculo->modelo }}"
                    class="w-full border rounded p-2">
            </div>

            <!-- Marca -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Marca</label>
                <input type="text" name="marca" required
                    value="{{ $veiculo->marca }}"
                    class="w-full border rounded p-2">
            </div>

            <!-- Placa -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Placa</label>
                <input type="text" name="placa" required
                    value="{{ $veiculo->placa }}"
                    class="w-full border rounded p-2">
            </div>

            <!-- Cor -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Cor</label>
                <input type="text" name="cor" required
                    value="{{ $veiculo->cor }}"
                    class="w-full border rounded p-2">
            </div>

            <!-- Botão -->
            <button
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Atualizar
            </button>

            <!-- Voltar -->
            <a href="{{ route('veiculos.index') }}"
               class="ml-4 text-gray-600 hover:underline">
                ← Voltar
            </a>

        </form>

    </div>
</x-app-layout>