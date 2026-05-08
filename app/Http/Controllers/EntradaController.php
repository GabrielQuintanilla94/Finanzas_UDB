<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada; // <-- Importante no olvidar esta línea

class EntradaController extends Controller
{
    public function create()
    {
        return view('entradas.create');
    }

       public function store(Request $request)
    {
        // 1. Validar que los datos vengan correctos
        $request->validate([
            'tipo' => 'required|string|max:255',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
            'factura_ruta' => 'nullable|image|max:2048', // Acepta imágenes hasta 2MB
        ]);

        // 2. Lógica para subir la foto (si el usuario adjuntó una)
        $rutaFactura = null;
        if ($request->hasFile('factura_ruta')) {
            $rutaFactura = $request->file('factura_ruta')->store('facturas_entradas', 'public');
        }

        // 3. Guardar todo en MySQL
        Entrada::create([
            'tipo' => $request->tipo,
            'monto' => $request->monto,
            'fecha' => $request->fecha,
            'factura_ruta' => $rutaFactura,
        ]);

        // 4. Regresar al panel principal tras guardar
        return redirect()->route('dashboard');
    }

    public function index()
    {
        // Traemos todas las entradas ordenadas por las más recientes
        $entradas = Entrada::orderBy('created_at', 'desc')->get();
        return view('entradas.index', compact('entradas'));
    }
}