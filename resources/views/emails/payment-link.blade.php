<!DOCTYPE html>
<html>
<head>
    <title>Payment Link</title>
</head>
<body>
    <p>Hello {{ $order->customer->name }},</p>
    <p>Your order with ID {{ $order->id }} is ready for payment.</p>
    <p>Please follow this link to complete your payment: <a href="{{ $paymentLink }}">{{ $paymentLink }}</a></p>
    <p>Thank you for your purchase!</p>
</body>
</html>
