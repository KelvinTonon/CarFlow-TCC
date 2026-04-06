<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Novo Agendamento
        </h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('agendamentos.store') }}" method="POST" class="max-w-lg">
            @csrf

            <!-- Cliente -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Cliente</label>
                <select name="cliente_id" id="cliente"
                    class="w-full border rounded p-2">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">
                            {{ $cliente->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Veículo -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Veículo</label>
                <select name="veiculo_id" id="veiculo"
                    class="w-full border rounded p-2">
                    @foreach($veiculos as $veiculo)
                        <option value="{{ $veiculo->id }}">
                            {{ $veiculo->modelo }} - {{ $veiculo->placa }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Serviço -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Serviço</label>
                <select name="servico_id"
                    class="w-full border rounded p-2">
                    @foreach($servicos as $servico)
                        <option value="{{ $servico->id }}">
                            {{ $servico->nome_servico }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Data -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Data</label>
                <input type="datetime-local" name="data_agendamento"
                    class="w-full border rounded p-2">
            </div>

            <!-- Botão -->
            <button
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Agendar
            </button>

            <!-- Voltar -->
            <a href="{{ route('agendamentos.index') }}"
               class="ml-4 text-gray-600 hover:underline">
                ← Voltar
            </a>

        </form>

    </div>

    <script>
        document.getElementById('cliente').addEventListener('change', function () {
            let clienteId = this.value;

            fetch('/veiculos-por-cliente/' + clienteId)
                .then(response => response.json())
                .then(data => {
                    let veiculoSelect = document.getElementById('veiculo');

                    veiculoSelect.innerHTML = '';

                    data.forEach(function (veiculo) {
                        let option = document.createElement('option');
                        option.value = veiculo.id;
                        option.text = veiculo.modelo + ' - ' + veiculo.placa;

                        veiculoSelect.appendChild(option);
                    });
                });
        });
    </script>

</x-app-layout>