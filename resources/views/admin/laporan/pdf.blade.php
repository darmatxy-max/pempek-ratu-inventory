<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>

    <style>
        body{
            font-family: sans-serif;
        }

        table{
            width:100%;
            border-collapse: collapse;
            margin-top:20px;
        }

        th, td{
            border:1px solid #ddd;
            padding:10px;
            font-size:13px;
        }

        th{
            background:#f97316;
            color:white;
        }
    </style>
</head>
<body>

<h2>Laporan Transaksi Pempek Ratu</h2>

<table>

    <thead>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Status</th>
            <th>Tanggal</th>
        </tr>
    </thead>

    <tbody>

        @foreach($pesanans as $pesanan)

        <tr>

            <td>#{{ $pesanan->id }}</td>

            <td>
                {{ $pesanan->customer->nama ?? '-' }}
            </td>

            <td>
                Rp {{ number_format($pesanan->total_harga) }}
            </td>

            <td>
                {{ $pesanan->status_pesanan }}
            </td>

            <td>
                {{ $pesanan->created_at->format('d M Y') }}
            </td>

        </tr>

        @endforeach

    </tbody>

</table>

</body>
</html>