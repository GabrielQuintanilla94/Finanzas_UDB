<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Resumen de Balance Financiero
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-green-500">
                    <div class="p-6">
                        <p class="text-sm text-gray-500 uppercase font-bold">Total Ingresos (+)</p>
                        <h3 class="text-3xl font-bold text-green-600">${{ number_format($totalEntradas, 2) }}</h3>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-red-500">
                    <div class="p-6">
                        <p class="text-sm text-gray-500 uppercase font-bold">Total Gastos (-)</p>
                        <h3 class="text-3xl font-bold text-red-600">${{ number_format($totalSalidas, 2) }}</h3>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 {{ $balanceTotal >= 0 ? 'border-blue-500' : 'border-orange-600' }}">
                    <div class="p-6">
                        <p class="text-sm text-gray-500 uppercase font-bold">Balance Actual</p>
                        <h3 class="text-3xl font-bold {{ $balanceTotal >= 0 ? 'text-blue-600' : 'text-orange-600' }}">
                            ${{ number_format($balanceTotal, 2) }}
                        </h3>
                    </div>
                </div>

            </div>

            <div class="mt-8 p-4 bg-blue-50 border border-blue-200 rounded-lg text-blue-700 text-sm">
                Este balance se calcula automáticamente restando el total de sus registros de salida al total de sus registros de entrada.
            </div>
        </div>
    </div>
</x-app-layout>