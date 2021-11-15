<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario 5</title>
</head>
<body>
    <form action="EntradaDatos.php" method="POST">
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
    </form>
</body>
</html>




