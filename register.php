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
            <!-- FORMULARIO DE REGISTRO -->
            <form method="post" id="login-form">
                <label for="name">Nombre</label>
                <input type="text" name="name" placeholder="María">
                
                <label for="lastname">Apellidos</label>
                <input type="text" name="lastname" placeholder="Gonzalez">
                <p class="desc">
                    Tu nombre y apellidos sera como firmaras tus notas y comentarios.
                </p>
                <label for="lastname">Nombre de Usuarie</label>
                <input type="text" name="username" placeholder="margonzalez92">
                <p class="desc">
                    Tu link de agora sera: <strong>usuarie</strong>.agora.online/</strong>
                </p>
                <input type="text" name="email" placeholder="Correo electrónico">
                <p class="desc">
                    Asegurate de usar una direccion de correo electronico real, deberas confirmar tu cuenta.
                </p>
                <input type="password" name="password" placeholder="Contraseña">
                <input type="password" name="password" placeholder="Confirmar Constraseña">
                <input type="submit" value="Registrarse">
                <p class="desc">
                    Si ya tienes una cuenta puedes <a href="login.php">Iniciar Sesión</a>
                </p>
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