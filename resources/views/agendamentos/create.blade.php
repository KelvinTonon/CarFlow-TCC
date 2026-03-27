<h1>Novo Agendamento</h1>

<form action="{{ route('agendamentos.store') }}" method="POST">
    @csrf

    <label>Cliente:</label>
    <select name="cliente_id" id="cliente">
        @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
        @endforeach
    </select><br><br>

    <label>Veículo:</label>
    <select name="veiculo_id" id="veiculo">
        @foreach($veiculos as $veiculo)
            <option value="{{ $veiculo->id }}">
                {{ $veiculo->modelo }} - {{ $veiculo->placa }}
            </option>
        @endforeach
    </select><br><br>

    <label>Serviço:</label>
    <select name="servico_id">
        @foreach($servicos as $servico)
            <option value="{{ $servico->id }}">
                {{ $servico->nome_servico }}
            </option>
        @endforeach
    </select><br><br>

    <label>Data:</label>
    <input type="datetime-local" name="data_agendamento"><br><br>

    <button type="submit">Agendar</button>
</form>

<br>
<a href="{{ route('agendamentos.index') }}">← Voltar</a>

<script>
document.getElementById('cliente').addEventListener('change', function() {
    let clienteId = this.value;

    fetch('/veiculos-por-cliente/' + clienteId)
        .then(response => response.json())
        .then(data => {
            let veiculoSelect = document.getElementById('veiculo');

            veiculoSelect.innerHTML = '';

            data.forEach(function(veiculo) {
                let option = document.createElement('option');
                option.value = veiculo.id;
                option.text = veiculo.modelo + ' - ' + veiculo.placa;

                veiculoSelect.appendChild(option);
            });
        });
});
</script>