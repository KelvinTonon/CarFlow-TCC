<h1>Cadastrar Cliente</h1>

<form action="{{ route('clientes.store') }}" method="POST">
    @csrf

    <input type="text" name="nome" placeholder="Nome" required><br><br>
    <input type="text" name="telefone" placeholder="Telefone" required><br><br>
    <input type="email" name="email" placeholder="Email"><br><br>
    <input type="text" name="endereco" placeholder="Endereço" required><br><br>

    <button type="submit">Salvar</button>
</form>

<br>
<a href="{{ route('clientes.index') }}">← Voltar</a>