<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Listado de Entradas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Factura</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($entradas as $entrada)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $entrada->fecha }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $entrada->tipo }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-green-600">${{ number_format($entrada->monto, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if($entrada->factura_ruta)
                                        <a href="{{ asset('storage/' . $entrada->factura_ruta) }}" target="_blank" class="text-blue-600 hover:underline">
                                            <img src="{{ asset('storage/' . $entrada->factura_ruta) }}" alt="Factura" class="h-12 w-12 object-cover rounded border">
                                        </a>
                                    @else
                                        <span class="text-gray-400 italic">Sin foto</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>