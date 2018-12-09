<?php
if ( isset($_POST['cancel'] ) ) {
    // Si el usuario da a cancel se le devuelve al index.php
    header("Location: index.php");
    return;
}
$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  // Contraseña php123
$fallo = false; 

if ( isset($_POST['name']) && isset($_POST['pass']) ) {
    if ( strlen($_POST['name']) < 1 || strlen($_POST['pass']) < 1 ) {
        $fallo = "Nombre de usuario y contraseña son obligatorios";
    } else {
        $check = hash('md5', $salt.$_POST['pass']);
        if ( $check == $stored_hash ) {
            header("Location: game.php?name=".urlencode($_POST['name']));
            return;
        } else {
            $fallo = "Contraseña Incorrecta";
        }
    }
}
?>

<html>
	<head>
	<title>Actividad 12 - Denis Perdomo</title>
	</head>
    <body style="font-family: sans-serif;">
    	<h1>Piedra, Papel, Tijera</h1>
    	<h2>Login</h2>
    	<?php
            if ( $fallo !== false ) {
                echo('<p style="color: red;">'.htmlentities($fallo)."</p>\n");
            }
        ?>
    	<form method="POST">
        	<label for="nameId">User Name</label>
			<input type="text" name="name" id="nameId"><br/>
			<label for="passId">Password</label>
			<input type="password" name="pass" id="passId"><br/>
			<br/>
        	<input type="submit" value="Log In">
			<input type="submit" name="cancel" value="Cancelar">
    	</form>
    </body>
</html>