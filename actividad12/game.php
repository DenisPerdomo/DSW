<?php


//Se comprueba que el nombre de usuario esté en la URL.
if (! isset($_GET['name']) || strlen($_GET['name']) < 1) {
    die('Falta el nombre del parámetro');
}
/*Este método para autenticar al usuario es un coladero,
 * porque cualquiera que ponga un parámetro con el nombre name
 * en la url, puede pasar a la página, sin necesidad de poner contreseña
 */

// Si el usuario pulsa logout se lleva a index.php
if (isset($_POST['logout'])) {
    header('Location: index.php');
    return;
}
// Valores del juego
// 0 Roca, 1 Papel, y 2 Tijeras
$valores = array('Piedra', 'Papel', 'Tijeras');
$valorJugador = isset($_POST["valorJugador"]) ? $_POST['valorJugador']+0 : -1;

$valorPc = rand(0, 2);

function check($computer, $human)
{
    if ($human == $computer) {
        return "Empate";
    } elseif ($human == 0) {
        if ($computer == 1) {
            return "T&uacute; pierdes";
        } else {
            return "T&uacute; ganas";
        }
    } elseif ($human == 1) {
        if ($computer == 0) {
            return "T&uacute; ganas";
        } else {
            return "T&uacute; pierdes";
        }
    } elseif ($human == 2) {
        if ($computer == 0) {
            return "T&uacute; pierdes";
        } else {
            return "T&uacute; ganas";
        }
    }
}

$result = check($valorPc, $valorJugador);
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Denis Perdomo - Actividad 12</title>
    </head>
    <body style="font-family: sans-serif;">
        <h1>Piedra, Papel, Tijera</h1>
        <?php
        if (isset($_REQUEST['name'])) {
            echo "<p>Bienvenido: ";
            echo htmlentities($_REQUEST['name']);
            echo "</p>\n";
        }
        ?>
        <form method="post">
            <select name="valorJugador">
                <option value="-1">Elige</option>
                <option value="0">Piedra</option>
                <option value="1">Papel</option>
                <option value="2">Tijeras</option>
                <option value="3">Test</option>
            </select>
            <input type="submit" value="JUEGA">
            <input type="submit" name="logout" value="Cerrar sesi&oacute;n">
        </form>
        <br>
        <div>
        <?php
        if ($valorJugador == -1) {
            print "Selecciona una opci&oacute;n para jugar.\n";
        } elseif ($valorJugador == 3) {
            echo"<table cellpadding=4>";
            echo "<tr><th>Jugador</th><th>Ordenador</th><th>Resultado</th></tr>";
            for ($c=0;$c<3;$c++) {
                for ($h=0;$h<3;$h++) {
                    $r = check($c, $h);
                    print "<tr><td>$valores[$h]</td><td>$valores[$c]</td><td>$r</td></tr>";
                }
            }
            echo "</table>";
        } else {
            echo"<table cellpadding=4>";
            echo "<tr><th>Jugador</th><th>Ordenador</th><th>Resultado</th></tr>";
            echo "<tr><td>$valores[$valorJugador]</td><td>$valores[$valorPc]</td><td>$result</td></tr>";
            echo "</table>";
        }
        ?>
        </div>
    </body>
</html>
