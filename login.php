<?php
    $tituloPagina = "Ágora: Explora. Expresa. Se parte"; // Esta variable cambia el titulo de la pagina
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php        
        include("./header.php"); // Incluimos el header (Tags html y head, incluyendo los archivos css) ver "header.php"
    ?>
</head>
<body>
    <?php include('./navbar.php'); ?> <!-- INCLUIMOS EL NAVBAR -->
    
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

    <?php
    include("./footer.php"); 
    include("./js.php");
    ?>
</body>
</html>