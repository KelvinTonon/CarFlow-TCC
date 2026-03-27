<h1>Cadastrar Veículo</h1>

<form action="{{ route('veiculos.store') }}" method="POST">
    @csrf

    <label>Cliente:</label>
    <select name="cliente_id">
        @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}">
                {{ $cliente->nome }}
            </option>
        @endforeach
    </select><br><br>

    <input type="text" name="modelo" placeholder="Modelo"><br><br>
    <input type="text" name="marca" placeholder="Marca"><br><br>
    <input type="text" name="placa" placeholder="Placa"><br><br>
    <input type="text" name="cor" placeholder="Cor"><br><br>

    <button type="submit">Salvar</button>
</form>

<br>
<a href="{{ route('veiculos.index') }}">← Voltar</a>