<?php 
session_start(); 
//$_SESSION['agenda']=$datos;
?>
<html>
<head>
<title>agenda</title>
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


        <?php 

            

            //Comprueba si se ha pulsado el boton submit
            if (isset($_GET["submit"])){

               /* $datos = [
                    'Nerea'=>'nlabandera@hotmail.com',
                    'Koldo'=>'kintxausti@gmail.com',
                    'Xabi'=>'xartola@gmail.com'   
                ];*/

                $nombre=$_GET['nombre'];
                $email=$_GET['email'];

                
                $_SESSION['agenda']= [
                    'Nerea'=>'nlabandera@hotmail.com',
                    'Koldo'=>'kintxausti@gmail.com',
                    'Xabi'=>'xartola@gmail.com'   
                ];
                $_SESSION['agenda'][$nombre]="$email";

                //$datos[$nombre]=$email;

                foreach ($_SESSION['agenda'] as $nombre => $email) {
                    echo $nombre.'-->'.$email.'<br>';
            }

            }
            
            
        ?>
    </body>
</html>