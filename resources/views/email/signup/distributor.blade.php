<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data['title']}}</title>
</head>
<body>
    <h3>{{$data['title']}}</h3>
    <p>
        To verify your account, you should verify your account.
        <a href="{{url(route('email_verify'))}}?token={{$data['token']}}">Active your account</a>
    </p>
</body>
</html>