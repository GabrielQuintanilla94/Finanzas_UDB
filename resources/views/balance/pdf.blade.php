<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Mensual de Balance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
        }
        .header {
            text-align: center;
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            font-size: 18px;
        }
        .tables-container {
            width: 100%;
            margin-bottom: 20px;
        }
        .tables-container td {
            vertical-align: top;
            padding: 0 10px;
            border: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #a0a0a0;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f3f4f6;
            text-align: center;
        }
        .table-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 16px;
        }
        .total-row td {
            font-weight: bold;
            background-color: #f9fafb;
        }
        .balance-box {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            border: 1px solid #ccc;
            padding: 15px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Reporte Mensual {{ now()->startOfMonth()->format('Y-m-d') }} / {{ now()->endOfMonth()->format('Y-m-d') }}</h2>
    </div>

    <table class="tables-container">
        <tr>
            <td style="width: 50%;">
                <div class="table-title">Entradas</div>
                <table>
                    <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($entradas as $entrada)
                        <tr>
                            <td>{{ $entrada->tipo }}</td>
                            <td>${{ number_format($entrada->monto, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="total-row">
                            <td>TOTAL</td>
                            <td>${{ number_format($totalEntradas, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </td>

            <td style="width: 50%;">
                <div class="table-title">Salidas</div>
                <table>
                    <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($salidas as $salida)
                        <tr>
                            <td>{{ $salida->tipo }}</td>
                            <td>${{ number_format($salida->monto, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="total-row">
                            <td>TOTAL</td>
                            <td>${{ number_format($totalSalidas, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </td>
        </tr>
    </table>

    <div class="balance-box">
        Balance Mensual: ${{ number_format($balance, 2) }}
    </div>
   
    <div style="text-align: center; margin-top: 30px;">
        <div class="table-title">Gráfico de balance mensual Entradas vs Salidas</div>
        <br>
        <img src="https://quickchart.io/chart?w=300&h=300&c={type:'pie',data:{labels:['Entradas','Salidas'],datasets:[{data:[{{ $totalEntradas }},{{ $totalSalidas }}],backgroundColor:['%232563eb','%23dc2626']}]}}" alt="Gráfico de Balance">
    </div>

</body>
</html>