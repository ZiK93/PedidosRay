<!DOCTYPE html>
<html lang="es">
<head>
  <title>Intercambio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="margin-top: 30px;margin-left:30px;margin-right:30px;">
    <div class="row text-center">
        <form action="intercambio.php" id="catform">
            <label for="tags_category"><h3>Por favor escriba a quien le toco regalarle para el intercambio:</h3></label>
            <input class="form-control" type="text" id="nombre" name="nombre" value="" required >
            <p>(esta información es totalmente confidencial por lo que no se sabrá quien es usted)</p>
            <input class="btn btn-primary btn-lg" type="submit" value="Enviar" style="width: 35%;">
        </form>
    </div>
</div>
<img src="22.png" alt="Formulario" width="100%" style="margin-bottom:20px;">
<div class="text-center">Creado por el guapo Luis Guillermo Rojas Blanco 2021 &copy;. Informes al 86084799. 93lrojas@gmail.com</div> 
<script>
    $(document).ready(function() { document.getElementById("nombre").value = ""; });
</script>
<?php
    if(isset( $_GET["nombre"] )){
        $log_content=$_GET["nombre"]."\n";
        $myfile = fopen("log.txt", "a");
        fwrite($myfile, $log_content);
        fclose($myfile);
        echo "<script>
            alert('Muy amable y gracias por su colaboración.');
            window.location.href = 'https://acegif.com/wp-content/uploads/2020/11/esmedgraciasve3d.gif'
        </script>";
    } 
?>

</body>
</html>

