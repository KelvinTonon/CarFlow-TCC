<h1>Agendamentos</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('agendamentos.create') }}">+ Novo Agendamento</a>

<table border="1" cellpadding="10">
    <tr>
        <th>Cliente</th>
        <th>Veículo</th>
        <th>Serviço</th>
        <th>Data</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>

    @foreach($agendamentos as $agendamento)
    <tr>
        <td>{{ $agendamento->cliente->nome }}</td>
        <td>{{ $agendamento->veiculo->modelo }}</td>
        <td>{{ $agendamento->servico->nome_servico }}</td>
        <td>{{ $agendamento->data_agendamento }}</td>
        <td>{{ $agendamento->status }}</td>
        <td>
        <a href="{{ route('agendamentos.edit', $agendamento->id) }}">Editar</a>
        <form action="{{ route('agendamentos.destroy', $agendamento->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Excluir agendamento?')">Excluir</button>
        </form></td>
    </tr>
    @endforeach
</table>