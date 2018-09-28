<?php
    require_once './fn.php';
    $tituloPagina = "Ágora: Explora. Expresa. Se parte"; // Esta variable cambia el titulo de la paginagit pu
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php        
        include("./header.php"); // Incluimos el header (Tags html y head, incluyendo los archivos css) ver "header.php"
    ?>
</head>
<body>
    <?php include("./navbar.php");?>
    <header id="landing-header">
        <div class="container">
            <section id="start">    
                <article>
                    <h2>
                        <strong>Ágora</strong> es una <strong>red social</strong> donde cualquiera puede encontrar un canal para <strong>expresar</strong> sus opiniones. 
                    </h2>
                </article>
            </section>
        </div>
    </header>
    <main>
    </main>
    <?php
    include('./footer.php');
    include('./js.php');
    ?>
</body>
</html>