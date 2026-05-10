<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel Principal
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900">
                    <h3 class="font-bold text-2xl text-gray-800 mb-6 border-b pb-3">Bienvenido al Sistema de Control de Finanzas</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="{{ route('entradas.create') }}" class="block p-4 border border-gray-200 rounded-lg hover:bg-blue-50 hover:border-blue-300 transition duration-150">
                            <span class="font-bold text-blue-600">1.</span> Registrar entrada
                        </a>
                        <a href="{{ route('salidas.create') }}" class="block p-4 border border-gray-200 rounded-lg hover:bg-blue-50 hover:border-blue-300 transition duration-150">
                            <span class="font-bold text-blue-600">2.</span> Registrar salida
                        </a>
                        <a href="{{ route('entradas.index') }}" class="block p-4 border border-gray-200 rounded-lg hover:bg-blue-50 hover:border-blue-300 transition duration-150">
                            <span class="font-bold text-blue-600">3.</span> Ver entradas
                         </a>
                        <a href="{{ route('salidas.index') }}" class="block p-4 border border-gray-200 rounded-lg hover:bg-blue-50 hover:border-blue-300 transition duration-150">
                            <span class="font-bold text-blue-600">4.</span> Ver salidas
                           </a>
                        
                        <a href="{{ route('balance.index') }}" class="block p-4 border border-gray-200 rounded-lg md:col-span-2 text-center hover:bg-blue-50 hover:border-blue-300 transition duration-150">
                            <span class="font-bold text-blue-600">5.</span> Mostrar balance
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>