<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Ciao Admin, c'è un nuovo Lead:</p>
    <div>
       <div>Nome: {{ $lead->name }}</div>
       <div>Email: {{ $lead->email }}</div>
       <div>Messaggio: {{ $lead->massage }}</div>
    </div>
    <div>Appena puoi rispondi.</div>
</body>
</html>
