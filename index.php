<?php
    //Funcion que comprueba si el usuario escribe un numero
    function no_numeros($string){
        $regex = "/[0-9]/";
       if(preg_match($regex, $string) == 0){
           echo "no tiene numeros";
       }else{
           echo "Error el campo que has introducido tiene un numero";
       }
       }
    //Funcion que comprueba si el usuario ha introducido una letra
    function no_letras($numero){
        $regex = "/[A-Za-zÑñ]/";
        if(preg_match($regex, $numero) == 0){
            echo "<br/>Son todos numeros ";
        }else{
            echo "<br/>tiene almenos una letra ";
        }
    }
    //Funcion para validar email
    function validar_email($string){
        $regex="/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/";
       echo preg_match($regex,$string);
    }
    //Funcion para validar la pagina web
    function validar_web($string){
       $regex = "/^(http|https|ftp):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+.(com|org|net|dk|at|us|tv|info|uk|co.uk|biz|se)$)(:(\d+))?\/?/i";
       echo preg_match($regex,$string);
    }
    no_numeros("holadas1s");
    no_letras(123);
    validar_email("sa@hotmail.com");
    validar_web("https://www.asdsaa.com");
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
            Nombre: <input type="text" name="nombre"/><br><br>
            Primer Apellido: <input type="text" name="apellido1"/>
            Segundo Apellido: <input type="text" name="apellido2"/><br><br>
            Dirección: <input type="text" name="direccion" placeholder="c/,nº"/><br><br>
            Ciudad: <input type="text" name="ciudad"/>
            Provincia: <input type="text" name="provincia"/>
            Código Postal: <input type="text" name="cp"/><br><br>
            Teléfono: <input type="text" name="tlf"/><br><br>
            Email: <input type="text" name="email">
            Contraseña: <input type="password" name="password"><br><br>
            Web: <input type="text" name="web"><br><br>
            <input type="submit" value="Guardar" name="guardar"/>
            <input type="reset" value="Reiniciar" name="reiniciar">
        </fieldset>
</body>
</html>