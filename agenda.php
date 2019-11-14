<!DOCTYPE html>
<?php 
session_start(); 
//$_SESSION['agenda']=$datos;
?>
<html>
<head>
    <title>agenda</title>
    <meta charset="utf-8">
    <style>

    input{
      margin-top: 5px;
  }
  .tarjeta{
    width: 300px;
    height: 100px;
    box-shadow: 1px 1px 5px black;
    margin: 5px;
}
#contacto{
   text-transform: uppercase;padding-top: 20px;
   font-weight: bold;
}
p{
    text-align: center;

}
legend{
   font-size: 20px;
}
</style>
</head>

<body>
	<?php $propietario=$_POST['propietario'] ?> 
    
    <h1>Hola <?php echo $propietario ?></h1>
    <form action="" action="GET">
    <fieldset>
        <legend>Añade contactos</legend>
        <label>Nombre: </label>
        <input id="nombre" name="nombre" type="text" placeholder="Introduce tu nombre"> <br>
        <label>E-mail: </label>
        <input id="email" name="email" type="text" placeholder="Introduce tu e-mail"><br>
        <br>
        <input type="submit" name="submit" value="Guardar">
    </fieldset>
    </form>

<div>

   <?php 
   /**Comprueba si se ha pulsado el boton submit*/
   if (isset($_GET["submit"])){

                //$Sintaxis = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
    /**Funcion strtolower para convertir la cadena a minúsculas */
    $nombre=strtolower($_GET['nombre']);
    $email=$_GET['email'];

    /**Si el nombre está vacío o no lo está pero no coincide con letras, lanza mensaje de error */
    if (empty($nombre) or (!empty($nombre) and !preg_match("/^[a-zA-Z ]*$/",$nombre))) {
        echo "Introduce nombre";
    }

    else{
        /**Si el nombre coincide con una clave del array agenda y el email está vacío, borra el contacto*/
        if (array_key_exists($nombre, $_SESSION['agenda']) and empty($email)) {
            unset($_SESSION['agenda'][$nombre]);
            /** y muestra los contactos*/
            foreach ($_SESSION['agenda'] as $nombre => $email) {
                echo '<div class="tarjeta"><p id="contacto">'.$nombre.'</p><p id="correo">'.$email.'</p></div>';
            }
        }

                    /**Si el correo no coincide con la sintaxis de un correo,
                     * Lanza mensaje y no imprime contactos
                     */
                    elseif (!preg_match('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#',$email)){
                        echo "Email erroneo";
                    }
                    /**Si el correo si coincide con la sintaxis dada, inserta los datos y muestra los contactos */
                    elseif (preg_match('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#',$email)) {
                        $_SESSION['agenda'][$nombre]="$email";
                        
                        foreach ($_SESSION['agenda'] as $nombre => $email) {
                            echo '<div class="tarjeta"><p id="contacto">'.$nombre.'</p><p id="correo">'.$email.'</p></div>';
                        }
                    }
                }



            }
            
            
            ?>
            
            
        </div>



    </body>
    </html>