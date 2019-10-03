<html>
<head>
<title>agenda</title>
</head>
    
    <body>

			<fieldset>
				<legend>Agenda</legend>
				<label>Nombre : </label>
                <input id="nombre" name="nombre" type="text" placeholder="Introduce tu nombre"> <br>
				<label>E-mail: </label>
                <input id="email" name="email" type="text" placeholder="Introduce tu e-mail" /><br>
				<br>
                <input type="submit"/>
			</fieldset>

        <?php 
            $datos = [
                'Nerea'=>'nlabandera@hotmail.com',
                'Koldo'=>'kintxausti@gmail.com'   
            ];

            
            
            $nombre=$_GET['nombre'];
            $email=$_GET['email'];
            
           // array_push($datos,$nombre=>$email);
           // print_r($datos);
            $datos[$nombre]=$email;

            foreach ($datos as $nombre => $email) {
                echo $nombre.'-->'.$email;
            }
        ?>
    </body>
</html>