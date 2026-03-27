<h1>Editar Serviço</h1>

<form action="{{ route('servicos.update', $servico->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nome_servico" value="{{ $servico->nome_servico }}"><br><br>
    <textarea name="descricao">{{ $servico->descricao }}</textarea><br><br>
    <input type="number" name="preco" step="0.01" value="{{ $servico->preco }}"><br><br>
    <input type="number" name="duracao_estimada" value="{{ $servico->duracao_estimada }}"><br><br>

    <button type="submit">Atualizar</button>
</form>

<br>
<a href="{{ route('servicos.index') }}">← Voltar</a>