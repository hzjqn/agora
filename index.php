<?php
    require_once './fn.php';
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
        <section id="features" class="wb">
            <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <article>
                        <h2>Explorá.</h2>
                        <p>
                            Navegá <strong>noticias</strong>, <strong>notas de opinión</strong>, <strong>blogs</strong> y mucho más. Indicá qué artículos te parecen <strong>útiles</strong> y cuanto <strong>respetas</strong> a una fuente.
                        </p>
                    </article>
                </div>
                <div class="col-12 col-md-4">    
                    <article>
                        <h2>Expresa.</h2>
                        <p>
                        <strong>Escribí, edita y publica</strong> tus propias notas. <strong>Compartí</strong> tus inquietudes, problemas, desafíos u opiniones con el mundo. Y encontrá <strong>seguidores</strong> y/o <strong>patrocinadores</strong>.
                        </p>
                    </article>
                </div>
                <div class="col-12 col-md-4">
                    <article>
                        <h2>Se parte.</h2>
                        <p>
                        Armá <strong>colecciones</strong> y <strong>archiva</strong> tus notas preferidas, seguí a tus autores <strong>favoritos</strong> y recibí notificaciones cuando estos publican contenido!
                        </p>
                    </article>
                </div>
            </div>
            </div>
        </section>
    </main>
    <?php 
    include('./join.php');
    include('./footer.php');
    include('./js.php');
    ?>
</body>
</html>