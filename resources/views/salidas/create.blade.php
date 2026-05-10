<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Registrar Nueva Salida
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <form action="{{ route('salidas.store') }}" method="POST" enctype="multipart/form-data" 
                  class="bg-white p-8 rounded-2xl shadow-xl border border-slate-100 space-y-6">
                @csrf
                
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Tipo de salida</label>
                    <input type="text" name="tipo" 
                           class="w-full rounded-xl border-slate-200 focus:border-red-500 focus:ring focus:ring-red-200 transition-shadow" 
                           placeholder="Ej. Pago de luz, Compra de inventario..." required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Monto ($)</label>
                    <input type="number" step="0.01" name="monto" 
                           class="w-full rounded-xl border-slate-200 focus:border-red-500 focus:ring focus:ring-red-200 transition-shadow" 
                           placeholder="0.00" required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Fecha</label>
                    <input type="date" name="fecha" 
                           class="w-full rounded-xl border-slate-200 focus:border-red-500 focus:ring focus:ring-red-200 transition-shadow" required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Factura (Foto)</label>
                    <input type="file" name="factura" accept="image/*" 
                           class="w-full text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 transition-all cursor-pointer" required>
                </div>

                <div class="pt-4">
                    <button type="submit" 
                            class="w-full flex justify-center items-center gap-2 bg-gradient-to-r from-red-500 to-rose-600 text-white font-bold py-3 px-6 rounded-xl shadow-lg shadow-red-500/30 hover:-translate-y-1 hover:shadow-2xl hover:from-red-600 hover:to-rose-700 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
                        </svg>
                        Guardar Salida
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>