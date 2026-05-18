<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Invoice Pempek Ratu</title>

    <style>

        body{
            font-family: sans-serif;
            padding:40px;
            color:#333;
        }

        .header{
            margin-bottom:30px;
        }

        .title{
            font-size:32px;
            font-weight:bold;
            color:#ea580c;
        }

        .subtitle{
            color:#666;
            margin-top:5px;
        }

        table{
            width:100%;
            border-collapse: collapse;
            margin-top:30px;
        }

        table th{
            background:#f3f4f6;
        }

        table, th, td{
            border:1px solid #ddd;
        }

        th, td{
            padding:14px;
            text-align:left;
        }

        .total{
            margin-top:30px;
            font-size:24px;
            font-weight:bold;
            color:#16a34a;
        }

        .status{
            padding:6px 12px;
            background:#16a34a;
            color:white;
            border-radius:6px;
            display:inline-block;
        }

    </style>

</head>

<body>

    <div class="header">

        <div class="title">
            PEMPEK RATU
        </div>

        <div class="subtitle">
            Invoice Pembayaran Customer
        </div>

    </div>

    <p>
        <strong>Invoice ID:</strong>
        #{{ $pesanan->id }}
    </p>

    <p>
        <strong>Customer:</strong>
        {{ $pesanan->customer->nama ?? '-' }}
    </p>

    <p>
        <strong>Tanggal:</strong>
        {{ $pesanan->created_at->format('d M Y H:i') }}
    </p>

    <table>

        <thead>

            <tr>

                <th>Total</th>
                <th>Pembayaran</th>
                <th>Status</th>

            </tr>

        </thead>

        <tbody>

            <tr>

                <td>
                    Rp {{ number_format($pesanan->total_harga) }}
                </td>

                <td>
                    {{ $pesanan->metode_pembayaran }}
                </td>

                <td>

                    <span class="status">
                        {{ $pesanan->status_pesanan }}
                    </span>

                </td>

            </tr>

        </tbody>

    </table>

    <div class="total">

        Total Bayar:
        Rp {{ number_format($pesanan->total_harga) }}

    </div>

</body>
</html>