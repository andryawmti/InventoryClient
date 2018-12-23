<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Transaction</title>
    <style>
        *{
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif, Helvetica;
            font-size: 12px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
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
        .container {
            /*text-align: center;*/
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .mar_top3 {
            margin-top: 30px;
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
        <div class="text-center">
            <h2>Detail {{ $transaction->transaction_category }} Transaction</h2>
        </div>
        <div class="mar_top3" style="height: 32px;">
            <div style="display: inline-block; float: left;">
                <div>
                    <b>
                        @if($transaction->transaction_category_id == 1)
                            Customer: {{$transaction->customer_name}}
                        @elseif($transaction->transaction_category_id == 2)
                            Distributor: {{$transaction->distributor_name}}
                        @endif
                    </b>
                </div>
                <div>
                    <b>Transaction Id: {{ $transaction->id }}</b>
                </div>
            </div>
            <div style="display: inline-block;float: right;">
                <div>
                    <b>Date: {{ date('d-m-Y', strtotime($transaction->created_at)) }}</b>
                </div>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaction->transaction_items as $x=> $ti)
                <tr>
                    <td class="text-center">{{ $x+1 }}</td>
                    <td>{{ $ti->product_name }}</td>
                    <td class="text-right">{{ $ti->price }}</td>
                    <td class="text-center">{{ $ti->quantity }}</td>
                    <td class="text-right">{{ $ti->price * $ti->quantity }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4">Sub Total</td>
                    <td class="text-right">{{ $transaction->sub_total }}</td>
                </tr>
                <tr>
                    <td colspan="4">Delivery Cost</td>
                    <td class="text-right">{{ $transaction->delivery_cost }}</td>
                </tr>
                <tr>
                    <td colspan="4">Grand Total</td>
                    <td class="text-right">{{ $transaction->total }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="footer">
        <p>Exported on {{ date('d-m-Y H:i:s')}} By {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
    </div>
</body>
</html>