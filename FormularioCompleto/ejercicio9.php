<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9 UD4_2: Sandra Cebrián</title>

    <style>
    *{
        margin: 0 auto;
    }
    .caja{
        text-align: center;
        width: 50%;
    }
    label {
        text-transform: uppercase;
        font-size: 1.3em;
    }
    input {
        margin-bottom: 15px;
        margin-top: 5px;
        margin-right: 5px;
    }
    h1{
        text-align: center;
    }
    p{
        margin: 20px;
    }

    </style>

</head>
<body>
<button><a href="index.php"> Volver atrás.</a></button>
    <h1>Recogida de datos ejercicio 9:</h1>
    <hr>
    <fieldset class="caja">
        <form method='post' action="valida9.php" enctype="multipart/form-data">

            <p><strong>Porfavor, rellene todos los campos: </strong></p>
            <p><label> Nombre Completo:</label><br>
            <input type="text" name="nombreCompleto" ></p>

            <p><label>Contraseña:</label><br>
            <input type="pasword" name="contrasenya" ></p>

            <p><label>Nivel de estudios:</label><br>
            <span>Sin estudios</span><input type="radio" name="estudios" value="Sin estudios">
            <span>Educación Secundaria Obligatoria</span><input type="radio" name="estudios" value="Educación Secundaria Obligatoria">
            <span>Bachillerato</span><input type="radio" name="estudios" value="Bachillerato">
            <span>Formación Profesional</span><input type="radio" name="estudios" value="Formación Profesional">
            <span>Estudios Universitarios</span><input type="radio" name="estudios" value="Estudios Universitarios"></p>
            
            
            <p> <label>Nacionalidad:</label><br>
            <span>Española</span><input type="radio" name="nacionalidad" value="Española">
            <span>Otra</span><input type="radio" name="nacionalidad" value="Otra"></p>

            <p> <label>Idiomas :</label><br>
            <span>Español</span> <input type="checkbox" name="idiomas[]" value="espanyol">
            <span>Inglés</span> <input type="checkbox" name="idiomas[]" value="ingles">
            <span>Francés</span> <input type="checkbox" name="idiomas[]" value="frances">
            <span>Alemán</span> <input type="checkbox" name="idiomas[]" value="aleman">
            <span>Italiano</span> <input type="checkbox" name="idiomas[]" value="italiano"> </p>

            <p><label>Email:</label><br>
            <input type="text" name="email"> </p>

            <!-- Para subir ficheros/archivos al servidor -->
            <input type="hidden" name="MAX_FILE_SIZE" value='50000'>
            <input type="FILE" name="foto"><br>
              

            
            <input type='submit' name='Enviar' />
            <input type="reset" value="Borrar">
        </form>
    </fieldset>


    
</body>
</html>