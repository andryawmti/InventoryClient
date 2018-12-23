<html>
<head>
    <title>Transactions Report</title>
    <style>
        body {
            font-family: Arial, sans-serif, Helvetica;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th {
            padding: 4px 4px;
            text-align: center;
        }
        td {
            padding: 3px 5px;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .container {
            text-align: center;
        }
        .footer {
            position: absolute;
            bottom: 0px;
            left: 0px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Transactions Report</h2>
        <table class="export-table">
            <thead>
            <tr>
                <th>No</th>
                <th>Transaction Id</th>
                <th width="13%">Date</th>
                @if($transaction_category_id == 1)
                    <th>Customer</th>
                @elseif($transaction_category_id == 2)
                    <th>Distributor</th>
                @endif
                <th>Status</th>
                <th>Sub Total</th>
                <th>Delivery Cost</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            {% $sub = 0 %}
            {% $delivery = 0 %}
            {% $total = 0 %}
            @foreach($transactions as $x => $t)
                <tr>
                    <td class="text-center">{{ $x+1 }}</td>
                    <td class="text-center">{{ $t->id }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($t->created_at)) }}</td>
                    @if($transaction_category_id == 1)
                        <td>{{ $t->customer_name }}</td>
                    @elseif($transaction_category_id == 2)
                        <td>{{ $t->distributor_name }}</td>
                    @endif
                    <td class="text-center">{{ $t->status }}</td>
                    <td class="text-right">{{ number_format($t->sub_total,0,'.',',') }}</td>
                    <td class="text-right">{{ number_format($t->delivery_cost, 0, '.', ',') }}</td>
                    <td class="text-right">{{ number_format($t->total, 0, '.', ',') }}</td>
                </tr>
                {% $total += $t->total %}
                {% $delivery += $t->delivery_cost %}
                {% $sub += $t->sub_total %}
            @endforeach
                <tr>
                    <td class="text-center" colspan="5">
                        <b>Total</b>
                    </td>
                    <td class="text-right"><b>{{ number_format($sub, 0, '.', ',') }}</b></td>
                    <td class="text-right"><b>{{ number_format($delivery, 0, '.', ',') }}</b></td>
                    <td class="text-right"><b>{{ number_format($total, 0, '.', ',') }}</b></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="footer">
        <p>Exported on {{ date('d-m-Y H:i:s')}} By {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
    </div>
</body>
</html>