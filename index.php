<?php session_start(); ?>
<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <link rel="stylesheet" href="css/login.css">
    </head>

    <body>
        <script src="js/js.js"></script>
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <!-- Tabs Titles -->

                <!-- Icon -->
                <div class="fadeIn first" style="margin-top: 20px;">
                </div>

                <!-- Login Form -->
                    <input type="text" id="usuario" class="fadeIn second" name="usuario" placeholder="Usuario">
                    <input type="password" id="contrasenia" class="fadeIn third" name="contrasenia" placeholder="Contraseña">
                    <input type="submit" class="fadeIn fourth" value="Log In" onclick="login()">
            </div>
        </div>
    </body>
</html>
