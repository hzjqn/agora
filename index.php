<?php
    $projectName = "ágora: explora. expresa. se parte.";
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
                    <div class="col-md-4">
                        <article>
                            <h2>Explorá.</h2>
                            <p>
                                Navegá <strong>noticias</strong>, <strong>notas de opinión</strong>, <strong>blogs</strong> y mucho más. Indicá qué artículos te parecen <strong>útiles</strong> y cuanto <strong>respetas</strong> a una fuente.
                            </p>
                        </article>
                    </div>
                    <div class="col-md-4">    
                        <article>
                            <h2>Expresa.</h2>
                            <p>
                            <strong>Escribí, edita y publica</strong> tus propias notas. <strong>Compartí</strong> tus inquietudes, problemas, desafíos u opiniones con el mundo. Y encontrá <strong>seguidores</strong> y/o <strong>patrocinadores</strong>.
                            </p>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article>
                            <h2>Se parte.</h2>
                            <p>
                            Armá <strong>colecciones</strong> y <strong>archiva</strong> tus notas preferidas, seguí a tus autores <strong>favoritos</strong> y recibí notificaciones cuando estos publican contenido!
                            </p>
                        </article>
                    </div>
                </div>
        </section>
        <section id="join" class="centered">
            <div class="container">
                <h3>
                    Unete a Ágora y comparte tu historia.
                </h3>
                <p>
                    <a href="login.php">Registrarse</a>
                </p>
            </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <img src="img/isologo.white.svg" alt="Agora Logo">
            <div class="footer-links">
                <a href="faq.php">Preguntas Frecuentes</a> | <a href="help.php">Ayúda</a>
            </div>
        </div>
    </footer>
    <script src="./js/main.js"></script>
</body>
</html>