    <aside id="join" class="centered">
        <div class="container">
            <?php if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                if(!isset($_SESSION['user'])){ ?>
                        <h3>
                            Unete a Ágora y comparte tu historia.
                        </h3>
                        <a class="mt-4" href="register.php">Registrarse</a>
            <?php } else { ?>
                        <h3>
                            Publica un articulo!
                        </h3>
                        <a class="mt-4" href="new_article.php">Escribir nuevo articulo</a>
            <?php } ?>
        </div>
    </aside>