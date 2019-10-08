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

            /**Comprueba si se ha pulsado el boton submit*/
            if (isset($_GET["submit"])){
                $Sintaxis = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
                /**Funcion strtolower para convertir la cadena a minúsculas */
                $nombre=strtolower($_GET['nombre']);
                $email=$_GET['email'];
                /**Si el nombre está vacío o no lo está pero no coincide con letras: */
                if (empty($nombre) or !preg_match("/^[a-zA-Z ]*$/",$nombre)) {
                    echo "Introduce nombre";
                }

                else{
                    /**Si el nombre coincide con una clave del array agenda y el email está vacío, borra el contacto*/
                    if (array_key_exists($nombre, $_SESSION['agenda']) and empty($email)) {
                        unset($_SESSION['agenda'][$nombre]);
                        foreach ($_SESSION['agenda'] as $nombre => $email) {
                            echo '<div class="tarjeta"><p>'.$nombre.'</p><p>'.$email.'</p></div>';
                        }
                    }
                    
                    /**Si el correo no coincide con la sintaxis de un correo (definida en una variable más arriba),
                     * Lanza mensaje y no imprime contactos
                     */
                    elseif (!preg_match($Sintaxis,$email)){
                        echo "Email erroneo";
                    }
                    /**Si el correo si coincide con la sintaxis dada, inserta los datos y muestra los contactos */
                    elseif (preg_match($Sintaxis,$email)) {
                        $_SESSION['agenda'][$nombre]="$email";
                        
                        foreach ($_SESSION['agenda'] as $nombre => $email) {
                            echo '<div class="tarjeta"><p>'.$nombre.'</p><p>'.$email.'</p></div>';
                        }
                    }
                }

            

            }
            
            
            ?>
            
            
        </div>


       
    </body>
</html>