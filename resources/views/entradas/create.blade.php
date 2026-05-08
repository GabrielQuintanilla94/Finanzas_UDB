<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Registrar Nueva Entrada
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <form action="{{ route('entradas.store') }}" method="POST" enctype="multipart/form-data" class="form-contenedor">
                @csrf
                
                <label class="form-label">Tipo de entrada</label>
                <input type="text" name="tipo" class="form-input" placeholder="Ej. Venta de servicios, Préstamo..." required>

                <label class="form-label">Monto ($)</label>
                <input type="number" step="0.01" name="monto" class="form-input" placeholder="0.00" required>

                <label class="form-label">Fecha</label>
                <input type="date" name="fecha" class="form-input" required>

                <label class="form-label">Factura (Foto)</label>
                <input type="file" name="factura_ruta" accept="image/*" class="form-input bg-white">

                <button type="submit" class="btn-guardar">
                    Guardar Entrada
                </button>
            </form>

        </div>
    </div>
</x-app-layout>