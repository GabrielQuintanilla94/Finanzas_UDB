<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salida;
use Illuminate\Support\Facades\Storage;

class SalidaController extends Controller
{
    public function create()
    {
        return view('salidas.create');
    }

    public function store(Request $request)
    {
   // 1. Validamos (Cambiamos 'mca' por 'mimes' igual que en entradas)
        $request->validate([
            'tipo' => 'required|string',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
            'factura' => 'required|image|mimes:jpg,png,jpeg|max:2048', 
        ]);

        // Guardamos la imagen en storage
        $rutaFoto = $request->file('factura')->store('facturas', 'public');

        // 2. Creamos el registro (Usamos 'factura_ruta' para la base de datos)
        Salida::create([
            'tipo' => $request->tipo,
            'monto' => $request->monto,
            'fecha' => $request->fecha,
            'factura_ruta' => $rutaFoto, 
        ]);

        return redirect()->route('dashboard');
    }

    public function index()
    {
        $salidas = Salida::orderBy('created_at', 'desc')->get();
        return view('salidas.index', compact('salidas'));
    }

    // Función para borrar una salida
    public function destroy(Salida $salida)
    {
        // 1. Verificamos si tiene foto y la borramos del disco duro
        if ($salida->factura_ruta) {
            Storage::disk('public')->delete($salida->factura_ruta);
        }

        // 2. Borramos el registro de la base de datos
        $salida->delete();

        // 3. Recargamos la página
        return redirect()->route('salidas.index');
    }
}