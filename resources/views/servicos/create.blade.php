<h1>Cadastrar Serviço</h1>

<form action="{{ route('servicos.store') }}" method="POST">
    @csrf

    <input type="text" name="nome_servico" placeholder="Nome"><br><br>
    <textarea name="descricao" placeholder="Descrição"></textarea><br><br>
    <input type="number" name="preco" step="0.01" placeholder="Preço"><br><br>
    <input type="number" name="duracao_estimada" placeholder="Duração (min)"><br><br>

    <button type="submit">Salvar</button>
</form>

<br>
<a href="{{ route('servicos.index') }}">← Voltar</a>