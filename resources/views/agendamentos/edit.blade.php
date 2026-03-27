<h1>Editar Agendamento</h1>

<form action="{{ route('agendamentos.update', $agendamento->id) }}" method="POST">
    @csrf
    @method('PUT')

    <select name="cliente_id">
        @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}"
                {{ $cliente->id == $agendamento->cliente_id ? 'selected' : '' }}>
                {{ $cliente->nome }}
            </option>
        @endforeach
    </select><br><br>

    <select name="veiculo_id">
        @foreach($veiculos as $veiculo)
            <option value="{{ $veiculo->id }}"
                {{ $veiculo->id == $agendamento->veiculo_id ? 'selected' : '' }}>
                {{ $veiculo->modelo }}
            </option>
        @endforeach
    </select><br><br>

    <select name="servico_id">
        @foreach($servicos as $servico)
            <option value="{{ $servico->id }}"
                {{ $servico->id == $agendamento->servico_id ? 'selected' : '' }}>
                {{ $servico->nome_servico }}
            </option>
        @endforeach
    </select><br><br>

    <input type="datetime-local" name="data_agendamento"
        value="{{ date('Y-m-d\TH:i', strtotime($agendamento->data_agendamento)) }}"><br><br>

    <button type="submit">Atualizar</button>
</form>