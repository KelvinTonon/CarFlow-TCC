<h1>Editar Cliente</h1>

<form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nome" value="{{ $cliente->nome }}"><br><br>
    <input type="text" name="telefone" value="{{ $cliente->telefone }}"><br><br>
    <input type="email" name="email" value="{{ $cliente->email }}"><br><br>
    <input type="text" name="endereco" value="{{ $cliente->endereco }}"><br><br>

    <button type="submit">Atualizar</button>
</form>

<br>
<a href="{{ route('clientes.index') }}">← Voltar</a>