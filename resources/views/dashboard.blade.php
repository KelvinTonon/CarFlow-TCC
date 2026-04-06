<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Dashboard</h2>
    </x-slot>

    <div class="p-6">

        <!-- CARDS -->
        <div class="grid grid-cols-4 gap-4 mb-6">

            <div class="bg-blue-500 text-white p-4 rounded shadow">
                <p class="text-sm">Clientes</p>
                <p class="text-2xl font-bold">{{ $totalClientes }}</p>
            </div>

            <div class="bg-green-500 text-white p-4 rounded shadow">
                <p class="text-sm">Veículos</p>
                <p class="text-2xl font-bold">{{ $totalVeiculos }}</p>
            </div>

            <div class="bg-yellow-500 text-white p-4 rounded shadow">
                <p class="text-sm">Agendamentos</p>
                <p class="text-2xl font-bold">{{ $totalAgendamentos }}</p>
            </div>

            <div class="bg-purple-500 text-white p-4 rounded shadow">
                <p class="text-sm">Hoje</p>
                <p class="text-2xl font-bold">{{ $agendamentosHoje }}</p>
            </div>

        </div>

        <!-- ÚLTIMOS AGENDAMENTOS -->
        <div class="bg-white shadow rounded p-4">
            <h2 class="font-bold mb-3">Últimos Agendamentos</h2>

            <table class="w-full">
                <tr class="border-b">
                    <th>Cliente</th>
                    <th>Veículo</th>
                    <th>Serviço</th>
                    <th>Data</th>
                    <th>Status</th>
                </tr>

                @foreach($ultimosAgendamentos as $agendamento)
                    <tr class="border-b">
                        <td>{{ $agendamento->cliente->nome }}</td>
                        <td>{{ $agendamento->veiculo->modelo }}</td>
                        <td>{{ $agendamento->servico->nome_servico }}</td>
                        <td>{{ \Carbon\Carbon::parse($agendamento->data_agendamento)->format('d/m/Y H:i') }}</td>
                        <td>
                            @if($agendamento->status == 'agendado')
                                <span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded">Agendado</span>
                            @elseif($agendamento->status == 'em_andamento')
                                <span class="bg-blue-200 text-blue-800 px-2 py-1 rounded">Em andamento</span>
                            @elseif($agendamento->status == 'finalizado')
                                <span class="bg-green-200 text-green-800 px-2 py-1 rounded">Finalizado</span>
                            @else
                                <span class="bg-red-200 text-red-800 px-2 py-1 rounded">Cancelado</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
</x-app-layout>