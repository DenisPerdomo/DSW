<?php
if (isset($_POST['cancel'])) {
    // Si el usuario da a cancel se le devuelve al index.php
    header("Location: index.php");
    return;
}
$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  // Contraseña php123
$fallo = false;

if (isset($_POST['email']) && isset($_POST['pass'])) {
    if (strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1) {
        $fallo = "Se requiere email y contraseña";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $fallo = "El correo electrónico debe tener un signo (@)";
    } else {
        $check = hash('md5', $salt.$_POST['pass']);
        if ($check == $stored_hash) {
            error_log("Login success ".$_POST['email']);
            header("Location: autos.php?email=".urlencode($_POST['email']));
        } else {
            $fallo = "Contraseña Incorrecta";
            error_log("Login fail: ".$_POST['email']." Hash: "." $check"." Salt: ".$salt);
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
    <title>Denis Perdomo - Actividad 18</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1>Aplicación Coches - A18</h1>
                <h2>Login</h2>
                <?php
                    if ($fallo !== false) {
                        echo('<div class="alert alert-danger">'.htmlentities($fallo)."</div>\n");
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
