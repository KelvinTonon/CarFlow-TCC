<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Clientes
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between mb-4">
                <h1 class="text-lg font-bold">Lista de Clientes</h1>

                @auth
                    @if(auth()->user()->tipo_usuario === 'admin')
                        <a href="{{ route('clientes.create') }}"
                           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            + Novo Cliente
                        </a>
                    @endif
                @endauth
            </div>

            <div class="bg-white shadow rounded">
                <table class="w-full table-auto">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 text-left">Nome</th>
                            <th class="p-3 text-left">Telefone</th>
                            <th class="p-3 text-left">Email</th>
                            <th class="p-3 text-left">Endereço</th>
                            <th class="p-3 text-left">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($clientes as $cliente)
                        <tr class="border-t">
                            <td class="p-3">{{ $cliente->nome }}</td>
                            <td class="p-3">{{ $cliente->telefone }}</td>
                            <td class="p-3">{{ $cliente->email }}</td>
                            <td class="p-3">{{ $cliente->endereco }}</td>

                            <td class="p-3 space-x-2">
                                @auth
                                    @if(auth()->user()->tipo_usuario === 'admin' || auth()->user()->cliente_id == $cliente->id)
                                        <a href="{{ route('clientes.edit', $cliente->id) }}"
                                           class="bg-yellow-400 px-3 py-1 rounded text-white">
                                            Editar
                                        </a>
                                    @endif

                                    @if(auth()->user()->tipo_usuario === 'admin')
                                        <form action="{{ route('clientes.destroy', $cliente->id) }}"
                                              method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')

                                            <button class="bg-red-500 px-3 py-1 rounded text-white"
                                                onclick="return confirm('Excluir cliente?')">
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