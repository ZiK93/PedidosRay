<?php
   session_start();
?>
<?php if(isset($_SESSION["user"])){
    $usuario = $_SESSION["user"]; ?>

<html>
    <head>
    <meta http-equiv='cache-control' content='no-cache'> 
    <meta http-equiv='expires' content='0'> 
    <meta http-equiv='pragma' content='no-cache'>
    <script>
    location.reload();</script>  
    </head>
</html>
<?php
session_destroy();
?>
<?php } else {
    header("Location: /index.php");
    exit();
} ?>

