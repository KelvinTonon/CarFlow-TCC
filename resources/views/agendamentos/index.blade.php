<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Agendamentos
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between mb-4">
                <h1 class="text-lg font-bold">Lista de Agendamentos</h1>

                <a href="{{ route('agendamentos.create') }}"
                   class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    + Novo Agendamento
                </a>
            </div>

            <div class="bg-white shadow rounded">
                <table class="w-full table-auto">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 text-left">Cliente</th>
                            <th class="p-3 text-left">Veículo</th>
                            <th class="p-3 text-left">Serviço</th>
                            <th class="p-3 text-left">Data</th>
                            <th class="p-3 text-left">Status</th>
                            <th class="p-3 text-left">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($agendamentos as $agendamento)
                        <tr class="border-t">
                            <td class="p-3">{{ $agendamento->cliente->nome }}</td>
                            <td class="p-3">{{ $agendamento->veiculo->modelo }}</td>
                            <td class="p-3">{{ $agendamento->servico->nome_servico }}</td>
                            <td class="p-3">{{ $agendamento->data_agendamento }}</td>

                            <td class="p-3">
                                {{ ucfirst(str_replace('_', ' ', $agendamento->status)) }}
                            </td>

                            <td class="p-3 space-x-2">
                                @auth
                                    @if(auth()->user()->tipo_usuario === 'admin' || auth()->user()->cliente_id == $agendamento->cliente_id)
                                        <a href="{{ route('agendamentos.edit', $agendamento->id) }}"
                                           class="bg-yellow-400 px-3 py-1 rounded text-white">
                                            Editar
                                        </a>
                                    @endif

                                    @if(auth()->user()->tipo_usuario === 'admin')
                                        <form action="{{ route('agendamentos.destroy', $agendamento->id) }}"
                                              method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')

                                            <button class="bg-red-500 px-3 py-1 rounded text-white"
                                                onclick="return confirm('Excluir agendamento?')">
                                                Excluir
                                            </button>
                                        </form>
                                    @endif
                                @endauth
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>