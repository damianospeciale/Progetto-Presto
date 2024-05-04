<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>presto.iy</title>
</head>
<body>
    <div>
        <h1>Un utente ha richiesto di lavorare con noi</h1>
        
        <p>Se vuoi renderlo revisore clicca qui:</p>
        <p>NAME: {{$user->name}}</p>
        <p>EMAIL: {{$user->email}}</p>
        <p>{{$description}}</p>
        <a href="{{route('make.revisor', compact('user'))}}">Rendi revisore</a>

        
    </div>
    
</body>
</html>