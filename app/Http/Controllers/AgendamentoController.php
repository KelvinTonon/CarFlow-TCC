<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\Veiculo;
use App\Models\Servico;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamento::with(['cliente', 'veiculo', 'servico'])->get();
        return view('agendamentos.index', compact('agendamentos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $veiculos = Veiculo::all();
        $servicos = Servico::all();

        return view('agendamentos.create', compact('clientes', 'veiculos', 'servicos'));
    }

    public function store(Request $request)
    {
        Agendamento::create($request->all());

        return redirect()->route('agendamentos.index')
            ->with('success', 'Agendamento criado com sucesso!');
    }

    public function edit($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $clientes = Cliente::all();
        $veiculos = Veiculo::all();
        $servicos = Servico::all();

        return view('agendamentos.edit', compact(
            'agendamento',
            'clientes',
            'veiculos',
            'servicos'
        ));
    }

    public function update(Request $request, $id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $agendamento->update($request->all());

        return redirect()->route('agendamentos.index')
            ->with('success', 'Agendamento atualizado!');
    }

    public function destroy($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $agendamento->delete();

        return redirect()->route('agendamentos.index')
            ->with('success', 'Agendamento excluído!');
    }
}

