<?php 
session_start(); 
//$_SESSION['agenda']=$datos;
?>
<html>
<head>
<title>agenda</title>
<style>
    .tarjeta{
        border: 1px solid black;
        width: 30%;
        margin: 5px;
    }
</style>
</head>
    
    <body> 
    
        <form action="" action="GET">
			<fieldset>
				<legend>Agenda</legend>
				<label>Nombre : </label>
                <input id="nombre" name="nombre" type="text" placeholder="Introduce tu nombre"> <br>
				<label>E-mail: </label>
                <input id="email" name="email" type="text" placeholder="Introduce tu e-mail" /><br>
				<br>
                <input type="submit" name="submit"/>
			</fieldset>
        </form>

        <div>
           
             <?php 

            //Comprueba si se ha pulsado el boton submit
            if (isset($_GET["submit"])){
                $Sintaxis = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';

                $nombre=$_GET['nombre'];
                $email=$_GET['email'];

                if (empty($nombre)) {
                    echo "Introduce el nombre";
                }

                elseif (preg_match($Sintaxis,$email)) {
                    $_SESSION['agenda'][$nombre]="$email";
                    
                    foreach ($_SESSION['agenda'] as $nombre => $email) {
                        echo '<div class="tarjeta"><p>'.$nombre.'</p><p>'.$email.'</p></div>';
                    }
                }
                /*else{
                    $_SESSION['agenda'][$nombre]="$email";
                    
                    foreach ($_SESSION['agenda'] as $nombre => $email) {
                        echo '<div class="tarjeta"><p>'.$nombre.'</p><p>'.$email.'</p></div>';
                    }

                }*/

            }
            
            
            ?>
            
            
        </div>


       
    </body>
</html>