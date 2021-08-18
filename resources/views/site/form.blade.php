<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Curso</title>
</head>
<body>
    <form action="{{ route('debug') }}" method="POST">
        @csrf
        <label>Titulo</label>
        <input type="text" name="title">

        <label>Subtitulo</label>
        <input type="text" name="subtitle">

        <Br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
