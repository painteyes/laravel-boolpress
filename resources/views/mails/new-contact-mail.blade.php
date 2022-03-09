<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>You have a new message from {{$new_lead->email}}</h2>
    <h6>Name: {{$new_lead->name}}</h6>
    <p>{{$new_lead->message}}</p>
</body>
</html>