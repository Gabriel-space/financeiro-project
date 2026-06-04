<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">

    <style>
        @page {
            margin: 35px 42px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            color: #0f172a;
            font-size: 12px;
        }

        .header {
            border-bottom: 3px solid #0f172a;
            padding-bottom: 16px;
            margin-bottom: 25px;
        }

        .brand {
            font-size: 28px;
            font-weight: bold;
            color: #0f172a;
        }

        .subtitle {
            font-size: 14px;
            color: #475569;
            margin-top: 3px;
        }

        .title {
            font-size: 22px;
            font-weight: bold;
            margin-top: 12px;
        }

        .date {
            margin: 18px 0 28px;
            color: #475569;
        }

        .cards {
            width: 100%;
            margin-bottom: 35px;
        }

        .cards td {
            width: 33.33%;
            padding: 0 8px;
        }

        .card {
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 18px;
            background: #f8fafc;
            text-align: center;
        }

        .card-label {
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        .card-value {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .green { color: #059669; }
        .red { color: #dc2626; }
        .blue { color: #0f172a; }

        .section-title {
            font-size: 17px;
            font-weight: bold;
            color: #0f172a;
            margin-top: 28px;
            padding-bottom: 8px;
            border-bottom: 2px solid #0f172a;
            text-transform: uppercase;
        }

        table.list {
            width: 100%;
            border-collapse: collapse;
            margin-top: 14px;
            margin-bottom: 25px;
        }

        table.list th {
            background: #f1f5f9;
            border: 1px solid #cbd5e1;
            padding: 10px;
            font-size: 11px;
            text-transform: uppercase;
        }

        table.list td {
            border: 1px solid #cbd5e1;
            padding: 10px;
        }

        .col-num {
            width: 40px;
            text-align: center;
        }

        .col-date {
            width: 110px;
            text-align: center;
        }

        .col-value {
            width: 130px;
            text-align: right;
        }

        .summary {
            border: 1px dashed #94a3b8;
            border-radius: 10px;
            padding: 18px;
            margin-top: 28px;
        }

        .summary-title {
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .summary-table {
            width: 100%;
        }

        .summary-table td {
            width: 33.33%;
            text-align: center;
            border-right: 1px solid #cbd5e1;
        }

        .summary-table td:last-child {
            border-right: none;
        }

        .footer {
            margin-top: 45px;
            border-top: 2px solid #0f172a;
            padding-top: 18px;
            font-size: 11px;
        }

        .signature {
            float: right;
            width: 230px;
            text-align: center;
        }

        .signature-line {
            border-top: 1px solid #0f172a;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="brand">CONTROLE-FINANCEIRO</div>
        <div class="subtitle">Sistema de Controle Financeiro</div>
        <div class="title">RELATÓRIO FINANCEIRO</div>
    </div>

    <div class="date">
        Gerado em {{ $dataGeracao }}
    </div>

    <table class="cards">
        <tr>
            <td>
                <div class="card">
                    <div class="card-label green">Total de Receitas</div>
                    <div class="card-value green">
                        R$ {{ number_format($totalReceitas, 2, ',', '.') }}
                    </div>
                    <div>Quantidade: {{ $receitas->count() }}</div>
                </div>
            </td>

            <td>
                <div class="card">
                    <div class="card-label red">Total de Despesas</div>
                    <div class="card-value red">
                        R$ {{ number_format($totalDespesas, 2, ',', '.') }}
                    </div>
                    <div>Quantidade: {{ $despesas->count() }}</div>
                </div>
            </td>

            <td>
                <div class="card">
                    <div class="card-label blue">Saldo Final</div>
                    <div class="card-value blue">
                        R$ {{ number_format($saldo, 2, ',', '.') }}
                    </div>
                    <div>Receitas - Despesas</div>
                </div>
            </td>
        </tr>
    </table>

    <div class="section-title">Receitas</div>

    <table class="list">
        <thead>
            <tr>
                <th class="col-num">#</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th class="col-date">Data</th>
                <th class="col-value">Valor</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($receitas as $index => $receita)
                <tr>
                    <td class="col-num">{{ $index + 1 }}</td>
                    <td>{{ $receita->descricao }}</td>
                    <td>{{ $receita->categoria?->nome }}</td>
                    <td class="col-date">
                        {{ date('d/m/Y', strtotime($receita->data_recebimento)) }}
                    </td>
                    <td class="col-value green">
                        R$ {{ number_format($receita->valor, 2, ',', '.') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="section-title">Despesas</div>

    <table class="list">
        <thead>
            <tr>
                <th class="col-num">#</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th class="col-date">Data</th>
                <th class="col-value">Valor</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($despesas as $index => $despesa)
                <tr>
                    <td class="col-num">{{ $index + 1 }}</td>
                    <td>{{ $despesa->descricao }}</td>
                    <td>{{ $despesa->categoria?->nome }}</td>
                    <td class="col-date">
                        {{ date('d/m/Y', strtotime($despesa->data_pagamento)) }}
                    </td>
                    <td class="col-value red">
                        R$ {{ number_format($despesa->valor, 2, ',', '.') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        <div class="summary-title">Resumo Geral</div>

        <table class="summary-table">
            <tr>
                <td>
                    <strong>Total de Receitas</strong><br>
                    <span class="green">
                        R$ {{ number_format($totalReceitas, 2, ',', '.') }}
                    </span>
                </td>

                <td>
                    <strong>Total de Despesas</strong><br>
                    <span class="red">
                        R$ {{ number_format($totalDespesas, 2, ',', '.') }}
                    </span>
                </td>

                <td>
                    <strong>Saldo Final</strong><br>
                    <span class="blue">
                        R$ {{ number_format($saldo, 2, ',', '.') }}
                    </span>
                </td>
            </tr>
        </table>
    </div>

    <div class="footer">
        Relatório emitido em {{ $dataGeracao }}<br>
        Controle-Financeiro - Sistema de Controle Financeiro
    </div>

</body>
</html>
