<?php
    $oldNum = '';
    $message = false;
    if ( isset($_POST['num']) ) {
        $oldNum = $_POST['num'];
        if(is_numeric($_POST['num'])){
            if ( $oldNum == 33 ) {
                $message = "¡Lo has adivinado!";
            } else if ( $oldNum < 33 ) {
                $message = "Tu número está por debajo...";
            } else {
                $message = "Muy por arriba...";
            }
        }else{
            $message = "Debes introducir un número";
        }
    }
?>
<html>
	<head>
	<title>Actividad 11 - Denis Perdomo</title>
	</head>
    <body style="font-family: sans-serif;">
        <p>Adivina el número</p>
        <?php
            if ( $message !== false ) {
                echo("<p>$message</p>\n");
            }
        ?>
    	<form method="post">
        	<p><label for="num">Introduce un número</label>
        	<input type="text" name="num" id="guess" size="40" value="<?= htmlentities($oldNum) ?>"/></p>
        	<input type="submit"/>
    	</form>
    </body>
</html>