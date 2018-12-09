<?php
session_start();
if (isset($_POST['cancel'])) {
    // Si el usuario da a cancel se le devuelve al index.php
    header("Location: index.php");
    return;
}
$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  // Contraseña php123
//Se comprueba si existe en el POST email y pass
if (isset($_POST['email']) && isset($_POST['pass'])) {
    //Se comprueba que no estén vacios
    if (strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1) {
        //Se crea el valor de error con el mensaje de error en la sesión.
        $_SESSION['error'] = "Se requiere email y contraseña";
        header("Location: login.php");
        return;
        //Sino esta vacío se comprueba que el correo este correcto.
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        //Sino esta correcto añadimos en la sesion el error con el mensaje.
        $_SESSION['error'] = "El correo electrónico debe tener un signo (@)";
        header("Location: login.php");
        return;
    } else {
        //Por último si email está bien y no estan vacios los campos
        //Se comprueba la contraseña.
        $check = hash('md5', $salt.$_POST['pass']);
        if ($check == $stored_hash) {
            //Si está ok, se añade en el log y se redirige a view.php
            error_log("Login success ".$_POST['email']);
            $_SESSION['name'] = $_POST['email'];
            header("Location: view.php");
            return;
        } else {
            error_log("Login fail: ".$_POST['email']." Hash: "." $check"." Salt: ".$salt);
            //Si está mal añadimos al sesión el mensaje de error.
            $_SESSION['error'] = "Contraseña Incorrecta";
            header("Location: login.php");
            return;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Denis Perdomo - Actividad 21</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1>Aplicación Coches - A21</h1>
                <h2>Login</h2>
                <?php
                    //Si existe en la sesión un error, lo mostramos.
                    if (isset($_SESSION['error'])) {
                        echo('<div class="alert alert-danger">'.htmlentities($_SESSION['error'])."</div>\n");
                        //Lo eliminamos una vez mostrado para que no se quede acumulado.
                        unset($_SESSION['error']);
                    }
                ?>
                <form class="form" method="POST">
                    <div class="form-group">
                        <label for="emailId">Email</label>
                        <input type="text" name="email" class="form-control" id="emailId">
                    </div>
                    <div class="form-group">
                        <label for="passId">Password</label>
                        <input type="password" name="pass" class="form-control" id="passId">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Log In">
                    <input type="submit" class="btn btn-primary" name="cancel" value="Cancelar">
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>
