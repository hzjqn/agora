
<!DOCTYPE html>
<html lang="en">
<head>
    <?php        
        include("./header.php"); // Incluimos el header (Tags html y head, incluyendo los archivos css) ver "header.php"
    ?>
</head>
<body>
    <?php include("./navbar.php");?>
    <main>
        <section>
            <article>
                <div class="container">
                    <h2>Error 404</h2>
                    <p class="desc">
                        El articulo que esta queriendo visualizar no se encuentra disponible o no existe.
                    </p>
                </div>
            </article>
        </section>
    </main>
    <?php 
    include('./footer.php');
    include('./js.php');
    ?>
</body>
</html>