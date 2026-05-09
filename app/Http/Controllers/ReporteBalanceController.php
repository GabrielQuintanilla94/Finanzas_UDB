<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada; // Traemos las entradas
use App\Models\Salida;  // Traemos las salidas

class ReporteBalanceController extends Controller
{
    public function index()
    {
        // 1. Sumamos todo el dinero que ha entrado
        $totalEntradas = Entrada::sum('monto');

        // 2. Sumamos todo el dinero que ha salido
        $totalSalidas = Salida::sum('monto');

        // 3. Calculamos el balance real (Entradas - Salidas)
        $balanceTotal = $totalEntradas - $totalSalidas;

        // 4. Enviamos estos 3 totales a la pantalla final
        return view('balance.index', compact('totalEntradas', 'totalSalidas', 'balanceTotal'));
    }
}