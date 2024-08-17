<!DOCTYPE html>
<html>
<head>
    <title>Order List</title>
</head>
<body>
    <h1>Orders</h1>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer->name }}</td>
                    <td>${{ $order->amount }}</td>
                    <td>
                        <a href="{{ route('admin.orders.generatePaymentLink', $order->id) }}">Send Payment Link</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
