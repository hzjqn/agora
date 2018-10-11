<?php
    require_once './fn.php';
    
    $tituloPagina = "Ágora | Registrarse"; // Esta variable cambia el titulo de la pagina
    $db = new JSONFile();

    if($_POST){
        $errors = Validation::validateRegister($db,$_POST);

        if(!$errors){
            $db->createUser($_POST);         
        }
    }
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
    <?php // include('./navbar.php'); ?>
    <!-- MAIN -->
    <main>
        <!-- SECCION LOGIN -->
        <section id="register">
            <!-- FORMULARIO DE REGISTRO -->
            <form method="post" id="login-form">
                <label for="name">Nombre</label>
                <input class="<?= isset($errors['name']) ? 'error' : ''?>" type="text" name="name" placeholder="María" value="<?= old('name') ?>">
                <?= isset($errors['name']) ? "<span class='error-span'>".$errors['name']."</span>" : ''?>
                <label for="lastname">Apellidos</label>
                <input class="<?= isset($errors['lastname']) ? 'error' : ''?>" type="text" name="lastname" placeholder="Gonzalez" value="<?= old('lastname') ?>">
                <?= isset($errors['lastname']) ? "<span class='error-span'>".$errors['lastname']."</span>" : ''?>
                <p class="desc sans">
                    Tu nombre y apellidos sera como firmaras tus notas y comentarios.
                </p>
                <label for="username">Nombre de Usuarie</label>
                <input class="<?= isset($errors['username']) ? 'error' : ''?>" type="text" name="username" placeholder="margonzalez92" value="<?= old('username') ?>">
                <?= isset($errors['username']) ? "<span class='error-span'>".$errors['username']."</span>" : ''?>
                <label for="email">Direccion de correo electronico</label>
                <input class="<?= isset($errors['email']) ? 'error' : ''?>" type="text" name="email" placeholder="mgonzalez92@correo.com" value="<?= old('email') ?>">
                <?= isset($errors['email']) ? "<span class='error-span'>".$errors['email']."</span>" : ''?>
                <p class="desc sans">
                    Asegurate de usar una direccion de correo electronico real, deberas confirmar tu cuenta.
                </p>
                <input class="<?= isset($errors['password']) ? 'error' : ''?>" type="password" name="password" placeholder="Contraseña" value="<?= old('password') ?>">
                <?= isset($errors['password']) ? "<span class='error-span'>".$errors['password']."</span>" : ''?>
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