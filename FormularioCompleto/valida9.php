<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9 UD4_2: Sandra Cebrián </title>

    <style>
    *{
        margin: 0 auto;
    }
    </style>

</head>
<body>
    <h1>Validación de datos</h1>

    <?php
    // Creo una Variable que va ir recogiendo todos los errores de la validacion
    $errores=array();
    //Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          //Comprobamos campo NOMBRECOMPLETO no nulo
          if(!empty($_POST['nombreCompleto'])) {
            $nombreCompleto = $_POST['nombreCompleto'];
            // Si es texto 
            if  (ctype_alpha($nombreCompleto)){
                // Comprobamos campo contrasenya;
                if(!empty($_POST['contrasenya'])) {  
                    $contrasenya = $_POST['contrasenya'];
                    //strlen saca la longitud de una cadena
                    if (strlen($contrasenya) > 6) {
                        // Comprobamos nivel de estudios: estudios
                        if (!empty($_POST['estudios'])){    
                            // nacionalidad
                            if (!empty($_POST['nacionalidad'])){
                                // Idiomas;
                                if (!empty($_POST['idiomas'])){
                                    // Email vacio
                                    if (!empty($_POST['email'])){
                                        // validar email
                                        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                                            if (!isset($_POST['foto'])){
                                                // se recogen los datos de la imagen
                                                // nombre temporal, durante la subida
                                                $temp_nam = $_FILES['foto']['tmp_name'];
                                                // nombre del aricho
                                                $fileName = $_FILES['foto']['name'];
                                                //tamaño
                                                $fileSize = $_FILES['foto']['size'];
                                                //tipo
                                                $fileType = $_FILES['foto']['type'];
                                                // tipo de error
                                                $errorImg= $_FILES['foto']['error'];
                                                // eligo el directorio donde se subirá
                                                $nombreDirectorio = "img/";
                                    
                                                //Me creo un array con las extensiones que voy a permitir
                                                $extensionesPermitidas = array('jpg', 'gif', 'png');
                                    
                                                if (in_array($fileType, $extensionesPermitidas)){
                                                    // Se comprueba que se haya subido bien
                                                    if (is_uploaded_file("tmp_name",$temp_nam)){
                                                        // se crea el nuevo nombre
                                                        $nombreCompleto = $nombreDirectorio.$fileName;
                                                        if (is_dir($nombreDirectorio)){ // es el directorio existe
                                                            // Generamos una id para el archivo
                                                            $idUnico = time();
                                                            // añadimos el id-nombre fichero
                                                            $nombreFichero = $idUnico."-".$fileName;
                                                            // reasignamos el nombrCompleto con el nombre fichero (nombre + id) y nombre directorio
                                                            $nombreCompleto = $nombreDirectorio.$nombreFichero;
                                                            // entonces usamos move_upload_file para mover el fichero donde queramos
                                                            move_uploaded_file ($_FILES['foto']['tmp_name'],$nombreCompleto);
                                                            // Si todo esto pasa, lanzamos un mensaje de válido.
                                                            echo "Fichero subido con el nombre: $nombreFichero<br>";

                                                        } else $errores[] = 'Directorio definitivo inválido';
                                                    } else $errores[] = "<br>La imagen no se ha subido correctamente.";
                                                } else $error[]="<br> Extensión no permitida.";
                                            } else $errores[]= "La foto es obligatoria.";
                                        } else $errores[]= "El campo email no cumple con los requisitos.";
                                    } else $errores[]= "El campo email no puede ser vacío.";
                                } else $errores[]= "No ha seleccionado ningún idioma.";
                            } else $errores[]= "Debe seleccionar su nacionalidad.";
                        } else $errores[]= "Debe seleccionar sus estudios.";
                    } else $errores[]= "La contraseña debe contener al menos 6 carácteres.";
                } else $errores[]= "La contraseña no puede estar vacía.";
            } else $errores[]= "El nombre no puede contener cáracteres que no sean alfabéticos.";
        } else $errores[]= "El nombre no puede ser vacío.";
    } else $errores[]= "Habido algún tipo de problema, por favor, reintentelo de nuevo.";
    
             if(!empty($errores)){
                foreach ($errores as $value) {
                    print("<br><strong>ATENCIÓN</strong><br>".$value);
                }
            } else {
                print("<h4> Su registro se ha completado con éxito.</h4>");
                print("<h4><br>Sandra Cebrián 2º DAW-B</h4>");
            }
    ?>
        
</body>
</html>
