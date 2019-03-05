<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Personalizacion</title>
	<style>
	body{
		font-size: {{$fuente}};
	}
	</style>
</head>
<body>
    <p>{{ $errors }}</p>
	<p>fuente: {{$fuente}}</p>
	<form action="/personalizacion" method="post">
        {{ csrf_field() }}
		Fuente:
		<!--<select name="fuente">
			<option value="24pt">Grande</option>
			<option value="16pt">Mediana</option>
			<option value="12pt">Pequeña</option>
		</select>-->
        <input type="text" name="fuente" value="">
		<br />
		<input type="submit" value="Enviar">
	</form>
</body>
</html>
