<h1>Clientes</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('clientes.create') }}">+ Novo Cliente</a>

<table border="1" cellpadding="10">
    <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Endereço</th>
        <th>Ações</th>
    </tr>

    @foreach($clientes as $cliente)
    <tr>
        <td>{{ $cliente->nome }}</td>
        <td>{{ $cliente->telefone }}</td>
        <td>{{ $cliente->email }}</td>
        <td>{{ $cliente->endereco }}</td>
        <td><a href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')

                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">
                Excluir
                </button>
                </form>
        </td>
        
    </tr>

    
    @endforeach
</table>