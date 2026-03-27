<h1>Veículos</h1>

<a href="{{ route('veiculos.create') }}">+ Novo Veículo</a>

<table border="1" cellpadding="10">
    <tr>
        <th>Cliente</th>
        <th>Modelo</th>
        <th>Marca</th>
        <th>Placa</th>
        <th>Cor</th>
        <th>Ações</th>
    </tr>

    @foreach($veiculos as $veiculo)
    <tr>
        <td>{{ $veiculo->cliente->nome }}</td>
        <td>{{ $veiculo->modelo }}</td>
        <td>{{ $veiculo->marca }}</td>
        <td>{{ $veiculo->placa }}</td>
        <td>{{ $veiculo->cor }}</td>
        <td><a href="{{ route('veiculos.edit', $veiculo->id) }}">Editar</a>
        <form action="{{ route('veiculos.destroy', $veiculo->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')

            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este veículo?')">Excluir</button>
        </form></td>
    </tr>

    @endforeach
</table>