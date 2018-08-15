<?php
    $tituloPagina = "Ágora: Explora. Expresa. Se parte"; // Esta variable cambia el titulo de la pagina
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php        
        include("./header.php"); // Incluimos el header (incluimos el contenido del header, incluyendo los archivos css) ver "header.php"
    ?>
    <!-- Si se quiere agregar css se puede agregar aqui -->

    <!-- == --> 
</head>
<body>
    <?php include('./navbar.php'); ?>
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
                <p class="desc sans">
                    Tu nombre y apellidos sera como firmaras tus notas y comentarios.
                </p>
                <label for="username">Nombre de Usuarie</label>
                <input type="text" name="username" placeholder="margonzalez92">
                <p class="desc sans">
                    Tu link de agora sera: <strong>usuarie</strong>.agora.online/</strong>
                </p>
                <label for="email">Direccion de correo electronico</label>
                <input type="text" name="email" placeholder="mgonzalez92@correo.com">
                <p class="desc sans">
                    Asegurate de usar una direccion de correo electronico real, deberas confirmar tu cuenta.
                </p>
                <input type="password" name="password" placeholder="Contraseña">
                <input type="password" name="password" placeholder="Confirmar Constraseña">
                <input type="submit" value="Registrarse">
                <p class="desc sans">
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