<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Invoice</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f5f5f5;
        }

        div.container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        hr {
            border: 1px solid #ccc;
            margin: 20px 0;
        }

        div.address {
            margin-bottom: 20px;
        }

        div.invoice-details {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        td {
            background-color: #fff;
        }

        h4 {
            color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="address">
        <hr>
        <div>
            <h4>{{$per->nama}}</h4>
            <div>{{$per->alamat}}</div>
            <div>{{$per->kota}}</div>
            <div>{{$per->notelp}}</div>
        </div>
        <hr>
        <div style="text-align: right;">
            <h4>{{$cus->nama}}</h4>
            <div>{{$cus->alamat}}</div>
            <div>{{$cus->kota}}</div>
            <div>{{$cus->notelp}}</div>
        </div>
    </div>

    <div class="invoice-details">
        <h4>{{$invoices->invoice_id}}</h4>
        <table>
            <thead>
                <tr style="font-weight:bold; ">
                    <td>Invoice Date:</td>
                    <td>Due Date:</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$invoices->tanggal}}</td>
                    <td>{{$invoices->duedate}}</td>
                </tr>
            </tbody>
        </table>
        <table>
            <thead>
                <tr style="font-weight:bold;">
                    <td>Description</td>
                    <td>Qty</td>
                    <td>Unit Price</td>
                    <td>Amount</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoicedetail as $inde )
                    <tr>
                        <td>{{$inde['item']['nama']}}</td>
                        <td>{{$inde->qty}}</td>
                        <td>Rp. {{ number_format($inde['item']['harga'], 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($inde->total_harga, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2">Payment Terms: Immediate Payment</td>
                    <td style="font-weight: bold">Untaxed Amount</td>
                    <td>Rp. {{ number_format($invoices->total, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>Taxes</td>
                    <td>Rp. {{ number_format($invoices->tax, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td colspan="2">Payment Communication: INV/2023/001</td>
                    <td style="font-weight: bold">Total</td>
                    <td>Rp. {{ number_format($invoices->totalharga, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
