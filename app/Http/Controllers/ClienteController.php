<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        if (auth()->user()->tipo_usuario === 'admin') {
            $clientes = Cliente::all();
        } else {
            $clientes = Cliente::where('id', auth()->user()->cliente_id)->get();
        }

        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        Cliente::create($request->only(['nome', 'telefone', 'email', 'endereco']));
        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function edit($id)
    {
        if (
            auth()->user()->tipo_usuario !== 'admin' &&
            auth()->user()->cliente_id != $id
        ) {
            abort(403);
        }

        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        if (
            auth()->user()->tipo_usuario !== 'admin' &&
            auth()->user()->cliente_id != $id
        ) {
            abort(403);
        }

        $cliente = Cliente::findOrFail($id);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente atualizado!');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente excluído com sucesso!');
    }
}


