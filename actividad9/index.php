<html>
    <head>
    	<title>Actividad 9 - Denis Perdomo</title>
    </head>
    <body>
    	<h1>Crack MD5</h1>
    	<?php
    	
        if(!empty($_GET["md5"])){
            $timeStart = microtime(true);
            $md5 = $_GET["md5"];
            $cont = 0;
            echo"<table>";
            for ($i = 0; $i < 10000; $i++) {
                $stringPin = str_pad($i, 4, "0", STR_PAD_LEFT);
                if($cont<15){
                    echo "<tr><td>".hash('md5',$stringPin)."</td><td>".$stringPin."</td></tr>";
                    $cont++;
                }
                if(hash('md5',$stringPin) === $md5){
                    break;
                }
            }
            echo"</table><br>";
            if ($i > 9999){
                echo "Numero no encontrado<br></br>";
            }else{
                echo "PIN: ".$stringPin."<br></br>";
                
            }
            $timeEnd = microtime(true);
            $timeTotal = $timeEnd - $timeStart;
            echo "Total Checks: ".$i."<br></br>";
            echo "Elapsed Time: ".$timeTotal."<br></br>";
            
        }
        ?>
    	<br>
    	<form>
			<input type="text" name="md5" size="60" />
			<input type="submit" value="Crack MD5"/>
		</form>
    
        
    </body>
</html>