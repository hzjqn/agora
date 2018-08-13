<?php
    $projectName = "ágora | Preguntas Frecuentes";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $projectName ?></title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="container">
            <div class="nav-header">            
                <div class="nav-container">
                    <div class="logo">
                        <h1 class="logo"><a href="index.php"><i class="agora-logo">Ágora</i></a></h1>
                    </div>
                    <button id="menuBtn">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </button>
                </div>
            </div>
            <div id="navbarList" class="nav-list">
                <div class="nav-container">
                    <ul>
                        <li class="login"><a href="login.php">Iniciar Sesión</a></li>
                        <li class="spacer">o</a></li>
                        <li class="reg"><a href="register.php">Registrarse</a></li>
                    </ul>
                </div>
            </div>
        </div>        
    </div>
    </nav>
    <!-- TERMINA NAVBAR -->
    <!-- MAIN -->
    <main>
        <!-- SECCION LOGIN -->
        <section id="login">
            <!-- FORMULARIO DE INICIO DE SESIÓN -->
            <form method="post" id="login-form">
                <input type="text" name="username" placeholder="Nombre de usuario o dirección de correo electronico">
                <input type="password" name="password" placeholder="Contraseña">
                <input type="checkbox" name="remember" value="true"><label for="remember">Recordar</label>
                <input type="submit" value="Iniciar Sesión">
            </form>
        </section>
    </main>
    <!-- TERMINA MAIN -->
    <!-- FOOTER -->
    <footer>
        <div class="container">
            <img src="img/isologo.white.svg" alt="Agora Logo">
            <div class="footer-links">
                <a href="faq.php">Preguntas Frecuentes</a> | <a href="help.php">Ayúda</a>
            </div>
        </div>
    </footer>
    <!-- TERMINA FOOTER -->
    <script src="./js/main.js"></script>
</body>
</html>