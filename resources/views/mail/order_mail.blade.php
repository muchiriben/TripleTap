<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Order</title>
</head>
<body>
    <h1>New Order is in.</h1>
    <h2>{{ $details['name'] }}</h2>
    <h2>{{ $details['location'] }}</h2>
    <h2>{{ $details['phone'] }}</h2>
    <h2>{{ $details['mpesa_code'] }}</h2>
    <p>{{ $details['notes'] }}</p>
    <h2>{{ $details['total'] }}</h2>
</body>
</html>