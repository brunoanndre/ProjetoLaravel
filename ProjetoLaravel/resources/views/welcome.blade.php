<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <h1>Laravel</h1>

    <a href="login">ir para a tela de login</a>
    @foreach($nomes as $nome)
        <p>{{$loop->index}} - {{$nome}}</p>
    @endforeach

</body>
</html>