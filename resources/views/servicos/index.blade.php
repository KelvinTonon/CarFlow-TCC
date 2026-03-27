<h1>Serviços</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('servicos.create') }}">+ Novo Serviço</a>

<table border="1" cellpadding="10">
    <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Duração</th>
        <th>Ações</th>
    </tr>

    @foreach($servicos as $servico)
    <tr>
        <td>{{ $servico->nome_servico }}</td>
        <td>{{ $servico->descricao }}</td>
        <td>R$ {{ $servico->preco }}</td>
        <td>{{ $servico->duracao_estimada }} min</td>

        <td>
            <a href="{{ route('servicos.edit', $servico->id) }}">Editar</a>

            <form action="{{ route('servicos.destroy', $servico->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')

                <button onclick="return confirm('Excluir serviço?')">Excluir</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>