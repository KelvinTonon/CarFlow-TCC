<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Serviços
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between mb-4">
                <h1 class="text-lg font-bold">Lista de Serviços</h1>

                @auth
                    @if(auth()->user()->tipo_usuario === 'admin')
                        <a href="{{ route('servicos.create') }}"
                           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            + Novo Serviço
                        </a>
                    @endif
                @endauth
            </div>

            <div class="bg-white shadow rounded">
                <table class="w-full table-auto">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 text-left">Nome</th>
                            <th class="p-3 text-left">Descrição</th>
                            <th class="p-3 text-left">Preço</th>
                            <th class="p-3 text-left">Duração</th>
                            <th class="p-3 text-left">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($servicos as $servico)
                        <tr class="border-t">
                            <td class="p-3">{{ $servico->nome_servico }}</td>
                            <td class="p-3">{{ $servico->descricao }}</td>
                            <td class="p-3">R$ {{ $servico->preco }}</td>
                            <td class="p-3">{{ $servico->duracao_estimada }} min</td>

                            <td class="p-3 space-x-2">
                                @auth
                                    @if(auth()->user()->tipo_usuario === 'admin')
                                        <a href="{{ route('servicos.edit', $servico->id) }}"
                                           class="bg-yellow-400 px-3 py-1 rounded text-white">
                                            Editar
                                        </a>

                                        <form action="{{ route('servicos.destroy', $servico->id) }}"
                                              method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')

                                            <button class="bg-red-500 px-3 py-1 rounded text-white"
                                                onclick="return confirm('Excluir serviço?')">
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