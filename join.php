            <?php if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if(!isset($_SESSION['user'])){ ?>
                <aside id="join" class="centered">
                    <div class="container">
                        <h3>
                            Unete a Ágora y comparte tu historia.
                        </h3>
                        <a class="mt-4" href="register.php">Registrarse</a>
                    </div>
                </aside>
            <?php } else { ?>
            <?php } ?>