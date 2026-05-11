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
        // 1. Validamos 
        $request->validate([
            'tipo' => 'required|string',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
            'factura' => 'required|image|mimes:jpg,png,jpeg|max:2048', 
        ]);

        // Guardamos la imagen en storage
        $rutaFoto = $request->file('factura')->store('facturas', 'public');

        // 2. Creamos el registro agregando el dueño (user_id)
        Salida::create([
            'user_id' => auth()->id(), // <--- AQUÍ LE ASIGNAMOS EL DUEÑO
            'tipo' => $request->tipo,
            'monto' => $request->monto,
            'fecha' => $request->fecha,
            'factura_ruta' => $rutaFoto, 
        ]);

       return redirect()->route('salidas.index')->with('success', 'Salida registrada con éxito.');
    }

    public function index()
    {
        // Filtramos para que solo traiga las salidas del usuario logueado
        // (Dejé el orderBy para que sigan saliendo ordenadas por fecha)
        $salidas = Salida::where('user_id', auth()->id())
                         ->orderBy('created_at', 'desc')
                         ->get();
                         
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