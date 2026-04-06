<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    public function index()
    {
        if (auth()->user()->tipo_usuario === 'admin') {
            $veiculos = \App\Models\Veiculo::with('cliente')->get();
        } else {
            $veiculos = \App\Models\Veiculo::where('cliente_id', auth()->id())
                ->with('cliente')
                ->get();
        }

        return view('veiculos.index', compact('veiculos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('veiculos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        Veiculo::create($request->all());

        return redirect()->route('veiculos.index')
            ->with('success', 'Veículo cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $clientes = Cliente::all();

        return view('veiculos.edit', compact('veiculo', 'clientes'));
    }

    public function update(Request $request, $id)
    {
        $veiculo = Veiculo::findOrFail($id);

        $veiculo->update($request->all());

        return redirect()->route('veiculos.index')
            ->with('success', 'Veículo atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->delete();

        return redirect()->route('veiculos.index')
            ->with('sucess', 'Veiculo excluidos com sucesso!');
    }
}