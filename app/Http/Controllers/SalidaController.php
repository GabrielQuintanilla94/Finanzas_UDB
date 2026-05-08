<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salida;

class SalidaController extends Controller
{
    public function create()
    {
        return view('salidas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string|max:255',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
            'factura_ruta' => 'nullable|image|max:2048',
        ]);

        $rutaFactura = null;
        if ($request->hasFile('factura_ruta')) {
            $rutaFactura = $request->file('factura_ruta')->store('facturas_salidas', 'public');
        }

        Salida::create([
            'tipo' => $request->tipo,
            'monto' => $request->monto,
            'fecha' => $request->fecha,
            'factura_ruta' => $rutaFactura,
        ]);

        return redirect()->route('dashboard');
    }

    public function index()
    {
        $salidas = Salida::orderBy('created_at', 'desc')->get();
        return view('salidas.index', compact('salidas'));
    }
}