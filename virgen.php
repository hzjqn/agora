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
    <?php include('./navbar.php'); ?> <!-- INCLUIMOS EL NAVBAR FIJO DE BOOTSTRAP(navbar.php) -->
    <!-- Usamos tags semanticos -->
    <main>
        <!-- SECCION LOGIN -->
        <section> <!-- Idealmente usen un id para cada sección distinto, para darle estilos con css -->

        </section>
    </main>
    <!-- TERMINA MAIN -->
    <?php
    include("./footer.php"); // Incluimos el footer (footer.php)
    include("./js.php"); // Incluimos el JavaScript global (js.php)
    ?>
    <!-- SI SE QUIERE AGREGAR JAVASCRIPT HACERLO AQUI -->
</body> <!-- Estos tags se abren en "header.php" y los cerramos aca -->
</html>