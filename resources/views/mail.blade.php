<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Message</title>
</head>
<body>
    <h1>New Guest Message Sent</h1>
    <h2>{{ $details['fname'] }}</h2>
    <h2>{{ $details['lname'] }}</h2>
    <h2>{{ $details['phone'] }}</h2>
    <h2>{{ $details['email'] }}</h2>
    <p>{{ $details['message'] }}</p>
</body>
</html>