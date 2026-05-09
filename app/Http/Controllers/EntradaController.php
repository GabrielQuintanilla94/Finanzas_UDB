<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EntradaController extends Controller
{
    // 1. Ver la lista de entradas
    public function index()
    {
        $entradas = Entrada::all();
        return view('entradas.index', compact('entradas'));
    }

    // 2. Mostrar el formulario de creación
    public function create()
    {
        return view('entradas.create');
    }

    // 3. Guardar los datos del formulario (Aquí está la magia)
    public function store(Request $request)
    {
        // Validamos que los datos sean correctos según el PDF
        $request->validate([
            'tipo' => 'required|string',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
            'factura' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Guardamos la imagen en la carpeta 'facturas' dentro de storage
        $rutaFoto = $request->file('factura')->store('facturas', 'public');

        // Creamos el registro en la base de datos
        Entrada::create([
            'tipo' => $request->tipo,
            'monto' => $request->monto,
            'fecha' => $request->fecha,
           'factura_ruta' => $rutaFoto,
        ]);

        return redirect()->route('entradas.index')->with('success', 'Entrada registrada con éxito.');
    }
}