<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Ciao {{ $lead->name }}</h1>

    <p>Abbiamo ricevuto il tuo messaggio: <br>
        {{ $lead->message }}
        <br>
        Ti risponderemo il prima possibile.
    </p>
</body>
</html>
