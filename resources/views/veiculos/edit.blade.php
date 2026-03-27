<h1>Editar Veículo</h1>

<form action="{{ route('veiculos.update', $veiculo->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Cliente:</label>
    <select name="cliente_id">
        @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}"
                {{ $cliente->id == $veiculo->cliente_id ? 'selected' : '' }}>
                {{ $cliente->nome }}
            </option>
        @endforeach
    </select><br><br>

    <input type="text" name="modelo" value="{{ $veiculo->modelo }}"><br><br>
    <input type="text" name="marca" value="{{ $veiculo->marca }}"><br><br>
    <input type="text" name="placa" value="{{ $veiculo->placa }}"><br><br>
    <input type="text" name="cor" value="{{ $veiculo->cor }}"><br><br>

    <button type="submit">Atualizar</button>
</form>

<br>
<a href="{{ route('veiculos.index') }}">← Voltar</a>