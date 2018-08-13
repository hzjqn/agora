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
    <header id="faq-header">
        <div class="container">
            <section id="start">    
                <article>
                    <h2>
                        <img src="img/isologo.white.svg" alt="ágora Logo">
                        Preguntas Frecuentes
                    </h2>
                </article>
            </section>
        </div>
    </header>
    <main>
        <section id="preguntas" class="wb">
                <div class="container">
                    <div>
                        <article>
                            <h2>Pregunta 1</h2>
                            <p>
                                Respuesta
                            </p>
                        </article>
                    </div>
                    <div>    
                        <article>
                            <h2>Pregunta 2</h2>
                            <p>
                                Respuesta
                            </p>
                        </article>
                    </div>
                    <div>
                        <article>
                            <h2>Pregunta 3</h2>
                            <p>
                                Respuesta
                            </p>
                        </article>
                    </div>
                    <div>
                        <article>
                            <h2>Pregunta 4</h2>
                            <p>
                                Respuesta
                            </p>
                        </article>
                    </div>
                    <div>
                        <article>
                            <h2>Pregunta 5</h2>
                            <p>
                                Respuesta
                            </p>
                        </article>
                    </div>
                    <div>
                        <article>
                            <center>     
                                <p>
                                    ¿Aún tenes dudas?  <a href="contacto.php">Contactate</a> con nosotros y pregunta lo que necesites.
                                </p>
                            </center>
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