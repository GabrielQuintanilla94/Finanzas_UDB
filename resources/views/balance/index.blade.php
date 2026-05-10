<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        
        <div class="flex justify-end mb-4">
            <a href="{{ route('balance.pdf') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Exportar a PDF
            </a>
        </div>

        <div class="grid grid-cols-2 gap-4 bg-white p-6 rounded shadow">
            
            <div>
                <h3 class="text-lg font-bold mb-2">Entradas</h3>
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2">Tipo</th>
                            <th class="border border-gray-300 px-4 py-2">Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($entradas as $entrada)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $entrada->tipo }}</td>
                            <td class="border border-gray-300 px-4 py-2">${{ number_format($entrada->monto, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="font-bold">
                            <td class="border border-gray-300 px-4 py-2">TOTAL</td>
                            <td class="border border-gray-300 px-4 py-2">${{ number_format($totalEntradas, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div>
                 <h3 class="text-lg font-bold mb-2">Salidas</h3>
                 <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2">Tipo</th>
                            <th class="border border-gray-300 px-4 py-2">Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($salidas as $salida)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $salida->tipo }}</td>
                            <td class="border border-gray-300 px-4 py-2">${{ number_format($salida->monto, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="font-bold">
                            <td class="border border-gray-300 px-4 py-2">TOTAL</td>
                            <td class="border border-gray-300 px-4 py-2">${{ number_format($totalSalidas, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
        </div>

        <div class="text-center my-6 text-xl font-bold">
            Balance Mensual: ${{ number_format($balance, 2) }}
        </div>

        <div class="bg-white p-6 rounded shadow mt-6 flex justify-center">
            <div class="w-1/2">
                <canvas id="graficoBalance"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('graficoBalance');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Entradas', 'Salidas'],
                datasets: [{
                    data: [{{ $totalEntradas }}, {{ $totalSalidas }}],
                    backgroundColor: ['#3b82f6', '#ef4444'], // Azul y Rojo como en la imagen
                }]
            }
        });
    </script>
</x-app-layout>