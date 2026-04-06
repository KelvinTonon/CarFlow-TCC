<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Veiculo;
use App\Models\Agendamento;

class DashboardController extends Controller
{
    public function index()
    {
        $totalClientes = Cliente::count();
        $totalVeiculos = Veiculo::count();
        $totalAgendamentos = Agendamento::count();

        // 🔥 ESSA LINHA QUE FALTAVA
        $agendamentosHoje = Agendamento::whereDate('data_agendamento', today())->count();

        // 🔥 ESSA TAMBÉM
        $ultimosAgendamentos = Agendamento::with(['cliente','veiculo','servico'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalClientes',
            'totalVeiculos',
            'totalAgendamentos',
            'agendamentosHoje',
            'ultimosAgendamentos'
        ));
    }
}