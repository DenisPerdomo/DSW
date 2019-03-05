<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Idioma Español</title>
</head>
<body>
    <form action="/idioma" method="post">
        {{ csrf_field() }}
        <select name="idioma">
			<option value="Español">Español</option>
			<option value="English">English</option>
		</select>
        <br>
		<input type="submit" value="Enviar">
    </form>
    @if ($idioma == 'Español')
        <h1>Esta página está en Español</h1>
        <br>
        <p>Se ha selecionado el idioma: {{$idioma}}</p>
    @endif
    @if ($idioma == 'English')
        <h1>This page is in English</h1>
        <br>
        <p>Selected language: {{$idioma}}</p>
    @endif
</body>
</html>
