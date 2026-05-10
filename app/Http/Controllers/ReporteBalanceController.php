<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Salida;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Para el paso 3

class ReporteBalanceController extends Controller
{
    public function index()
    {
        // Obtener todos los registros
        $entradas = Entrada::all();
        $salidas = Salida::all();

        // Calcular los totales usando las colecciones de Laravel
        $totalEntradas = $entradas->sum('monto');
        $totalSalidas = $salidas->sum('monto');
        
        // Calcular el balance final
        $balance = $totalEntradas - $totalSalidas;

        return view('balance.index', compact('entradas', 'salidas', 'totalEntradas', 'totalSalidas', 'balance'));
    }
  public function exportPdf()
    {
        // Traemos los datos
        $entradas = Entrada::all();
        $salidas = Salida::all();
        $totalEntradas = $entradas->sum('monto');
        $totalSalidas = $salidas->sum('monto');
        $balance = $totalEntradas - $totalSalidas;

        // ¡AQUÍ ESTÁ LA MAGIA! Agregamos ->setOptions(['isRemoteEnabled' => true])
        $pdf = Pdf::loadView('balance.pdf', compact('entradas', 'salidas', 'totalEntradas', 'totalSalidas', 'balance'))
                  ->setOptions(['isRemoteEnabled' => true]);
        
        return $pdf->download('Reporte_Mensual.pdf');
    }
}