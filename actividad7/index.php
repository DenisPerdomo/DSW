<html>
    <head>
    	<title>Actividad 7 - Denis Perdomo</title>
    </head>
    <body>
    	<h1>Adivinando Parámetros</h1>
    	<?php
    	$numPrim = 10;
    	$url = $_SERVER['REQUEST_URI'];
    	$signo = substr($url, -1); ;
    	
    	if($signo == "?"){
    	    echo "<p>Falta el número</p>";
    	}elseif(empty($_GET)){
    	    echo "<p>No has especificado ningún número</p>";
    	}elseif(!is_numeric($_GET["num"])){
    	    echo "Debe introducir un número";
    	}elseif(!empty($_GET["num"])){
    	    $a = $_GET["num"];
    	    if ($a>$numPrim) {
    	        echo "<p>El número es mayor.</p>";
    	    }elseif($a<$numPrim){
    	        echo "<p>El número es menor.</p>";
    	    }elseif($a==$numPrim){
    	        echo "<p>Enhorabuena. Has acertado</p>";
    	    }
    	}
    	?>
    </body>
</html>
  
