<!doctype html>
<html lang="en">
<head>
    <title>Order details</title>
</head>
<body>
<h1>Hello, {{ $user->name }}</h1>
<p>You are receiving this email because you recently made an order at <a href="">Best Store</a>. Here's the order details:</p>
Name: {{ $order->name }}
</body>
</html>
