<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 16px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        .status {
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: bold;
        }

        .pending {
            background-color: #ffc107;
            color: #fff;
        }

        .completed {
            background-color: #28a745;
            color: #fff;
        }

        .cancelled {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
</head>

<body>
    <h1>My Orders</h1>

    @if ($orders->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Items</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>
                            <ul>
                                @foreach (json_decode($order->order_items, true) as $item)
                                    <li>{{ $item['name'] }} ({{ $item['quantity'] }}) -
                                        ${{ number_format($item['price'], 2) }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            ${{ number_format(
                                collect(json_decode($order->order_items, true))->sum(function ($i) {
                                    return $i['price'] * $i['quantity'];
                                }),
                                2,
                            ) }}
                        </td>
                        <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                        <td>
                            @php
                                $status = $order->status ?? 'pending';
                            @endphp
                            <span class="status {{ $status }}">{{ ucfirst($status) }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="text-align:center; color: #777;">No orders found.</p>
    @endif
</body>

</html>
