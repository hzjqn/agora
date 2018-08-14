<?php
    $tituloPagina = "Ágora: Pagina Virgen"; // Esta variable cambia el titulo de la pagina
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php        
        include("./header.php");    // Incluimos el header (Tags html y head, incluyendo los archivos css) ver "header.php"
                                    // Tambien ver http://php.net/manual/es/function.include.php
    ?>
</head>
<body>
    <?php include('./navbar.php'); ?> <!-- INCLUIMOS EL NAVBAR FIJO DE BOOTSTRAP(navbar.php) -->
    <!-- Usamos tags semanticos -->
    <main>
        <!-- SECCION LOGIN -->
        <section> <!-- Idealmente usen un id para cada sección distinto, para darle estilos con css -->

            <!-- Si se quiere alinear el texto con el resto usar un <div class="container"> de bootstrap -->
            <div class="container">
                CONTENIDO
            </div> 

        </section>
    </main>
    <!-- TERMINA MAIN -->
    <?php
    // include("./join.php"); // Incluimos el aside de recrutacion? Descomentar si = true;
    include("./footer.php"); // Incluimos el footer (footer.php)
    include("./js.php"); // Incluimos el JavaScript global (js.php)
    ?>
    <!-- SI SE QUIERE AGREGAR JAVASCRIPT HACERLO ACÁ -->
</body> <!-- Estos tags se abren en "header.php" y los cerramos aca -->
</html>