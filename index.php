<?php
    //Array para guardar las provincias
    $provincias = [];
    //Funcion que comprueba si el usuario escribe un numero
    function no_numeros($string){
        $regex = "/[^A-Za-z]/";
       if(preg_match($regex, $string) == 0){
           echo "no tiene numeros<br/>";
       }else{
           echo "Error el campo que has introducido tiene un numero<br/>";
       }
       }
    //Funcion que comprueba si el usuario ha introducido una letra
    function no_letras($numero){
        $regex = "/[^0-9]/";
        if(preg_match($regex, $numero) == 0){
            echo "Son todos numeros<br/>";
        }else{
            echo "tiene almenos una letra<br/>";
        }
    }
    //Funcion para validar email
    function validar_email($string){
        $regex="/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/";
        //Si el preg_match devuelve un 1 significa que es valido.
       return preg_match($regex,$string);
    }
    //Funcion para validar la pagina web
    function validar_web($string){
       $regex = "/^(http|https|ftp):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+.(com|org|net|dk|at|us|tv|info|uk|co.uk|biz|se)$)(:(\d+))?\/?/i";
        //Si el preg_match devuelve un 1 significa que es valido.
       return preg_match($regex,$string);
    }
    /*Requisitos Entre 8 y 16 caracteres
        Al menos un número
        Al menos una mayúscula
        Al menos una minúscula
        Al menos un caracter extraño*/
    //Funcion que comprueba si la contraseña cumple lo requisitos
    function validar_password($string){
        $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W)[A-Za-z\d\W]{8,16}$/";
        //Si el preg_match devuelve un 1 significa que es valido.
        return preg_match($regex,$string);
    }

    //Leer ficheros y guardarlos en un array.
    $archivo = file_get_contents("archivo.txt");
    $array_general = explode("\n", $archivo);
    foreach ($array_general as $fila){
        //El limit es +2 porque tiene que ser positivo para que cuando la funcion
        //encuentre el primer espacio salte directamente y no lo haga por cada espacio que encuentre
    $item = explode(" ", $fila, +2);
    $provincias[] = [
        'numero' => $item[0],
        'nombre' => $item[1]
     ];
    }

    //Funcion para comprobar el código postal
    function cod_postal($numero){
        if(isset($_POST['guardar'])){
            $valor = $_POST['provincias'];
            echo $valor;
            //Si el value del option es distintos a los dos primeros digitos pasados pro la funcion dara un error.
            if( $valor !== substr($numero,0,2)){
                echo "error";
            }
        }
    }

    if (isset($_POST['guardar'])){//recojo los valores del formulario y los guardo en variables
        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
        $apellido1 = filter_input(INPUT_POST, 'apellido', FILTER_SANITIZE_STRING);
        $apellido2 = filter_input(INPUT_POST, 'apellido', FILTER_SANITIZE_STRING);
        $direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
        $ciudad = filter_input(INPUT_POST, 'ciudad', FILTER_SANITIZE_STRING);
        $provincia = filter_input(INPUT_POST, 'provincia', FILTER_SANITIZE_STRING);
        $cp = filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_STRING);
        $tlf = filter_input(INPUT_POST, 'tlf', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $web = filter_input(INPUT_POST, 'web', FILTER_SANITIZE_STRING);

        no_numeros($nombre);//compruebo si nombre lleva numeros

        no_numeros($apellido1);//compruebo si apellido lleva numeros

        no_numeros($apellido2);//compruebo si apellido lleva numeros

        no_numeros($ciudad);//compruebo si ciudad lleva numeros

        no_letras($tlf);//compruebo si telefono lleva letras

        if(strlen($tlf) != 9){//compruebo si telefono tiene 9 digitos
            echo "tu teléfono debe llevar 9 digitos"."<br>";
        }
        no_letras($cp);//compruebo si codigo postal lleva letras

        if(strlen($cp) != 5){//compruebo si codigo postal tiene 5 digitos
            echo "tu cp debe llevar 5 digitos"."<br>";
        }
        if(validar_email($email) != 1){//compruebo si la estructura del email es correcta
            echo "tu email es incorrecto"."<br>";
        }else{
            echo "tu email es correcto"."<br>";
        }
        if(validar_password($password) != 1){//compruebo si contraseña es correcta(mayuscula,minuscula,numero,caracter especial,longitud de 8-16)
            echo "tu contraseña es incorrecta"."<br>";
        }else{
            echo "tu contraseña es correcto"."<br>";
        }
        if(validar_web($web) == 1){//comprueba que la estructura de la web sea correcta
            echo "tu web es incorrecta"."<br>";
        }else{
            echo "tu web es correcta"."<br>";
        }


    }


?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario de entradas de datos</title>
</head>
<body>

    <form action="index.php" method="POST">
        <fieldset>
            <legend>Rellena tus datos personales</legend>
            <label for="">Nombre: </label> <input type="text" name="nombre"/><br><br>
            <label for="">Primer Apellido:</label> <input type="text" name="apellido1"/>
            <label for="">Segundo Apellido:</label><input type="text" name="apellido2"/><br><br>
            <label for="">Dirección: </label><input type="text" name="direccion" placeholder="c/,nº"/><br><br>
             <label for="">Ciudad:</label> <input type="text" name="ciudad"/>
            <label for=""> Provincia: </label>
            <select name="provincias" id="">
            <?php foreach ($provincias as $key => $row) {?>
                <option value="<?php echo $row['numero']; ?>" ><?php echo $row['nombre']; ?></option>
            <?php } ?>
            </select>
             <label for="">Código Postal: </label><input type="number" value="" name="cp"/><br><br>
             <label for="">Teléfono: </label><input type="text" name="tlf"/><br><br>
             <label for="">Email: </label><input type="text" name="email">
             <label for="">Contraseña:</label> <input type="password" name="password"><br><br>
             <label for="">Web:</label> <input type="text" name="web"><br><br>
            <input type="submit" value="Guardar" name="guardar"/>
            <input type="reset" value="Reiniciar" name="reiniciar">
        </fieldset>
</body>
</html>