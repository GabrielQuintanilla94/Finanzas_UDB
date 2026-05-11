<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Salida;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteBalanceController extends Controller
{
    public function index()
    {
        // 1. Filtrar solo los registros del usuario logueado
        $entradas = Entrada::where('user_id', auth()->id())->get();
        $salidas = Salida::where('user_id', auth()->id())->get();

        // Calcular los totales
        $totalEntradas = $entradas->sum('monto');
        $totalSalidas = $salidas->sum('monto');
        
        // Calcular el balance final
        $balance = $totalEntradas - $totalSalidas;

        return view('balance.index', compact('entradas', 'salidas', 'totalEntradas', 'totalSalidas', 'balance'));
    }

    public function exportPdf()
    {
        // 2. Filtrar también para el PDF
        $entradas = Entrada::where('user_id', auth()->id())->get();
        $salidas = Salida::where('user_id', auth()->id())->get();
        
        $totalEntradas = $entradas->sum('monto');
        $totalSalidas = $salidas->sum('monto');
        $balance = $totalEntradas - $totalSalidas;

        $pdf = Pdf::loadView('balance.pdf', compact('entradas', 'salidas', 'totalEntradas', 'totalSalidas', 'balance'))
                  ->setOptions(['isRemoteEnabled' => true]);
        
        return $pdf->download('Reporte_Mensual.pdf');
    }
}