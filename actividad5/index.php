<!DOCTYPE HTML>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <title>Denis Perdomo</title>
    </head>
    <body>
    	<h1>Denis Perdomo</h1>
    	<p>
    		The SHA256 hash of "Denis" is <?php echo hash('sha256', 'Denis');?>
    	</p>
    	<pre>ASCII ART:
         <?php 
         for ($i = 0; $i < 7; $i++) {
             switch ($i){
                 case 0:
                     echo"\n";
                    break;
                 case 1:
                     echo"     _____\n";
                 break;
                 
                 case 2:
                     echo"    |  __ \ \n";
                 break;
                 
                 case 3:
                     echo"    | |  | |\n";
                 break;
                 
                 case 4:
                     echo"    | |  | |\n";
                     break;
                     
                 case 5:
                 echo"    | |__| |\n";
                    break;
                 
                 case 6:
                     echo"    |_____/ \n";
                     break;
             }
         }
         ?>
    	</pre>
    	<a href="check.php">Click here to check the error setting</a>
		<br/>
		<a href="fail.php">Click here to cause a traceback</a>
    </body>
</html>