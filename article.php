<?php
    require_once './fn.php';
    $tituloPagina = "Ágora: Explora. Expresa. Se parte"; // Esta variable cambia el titulo de la pagina

    if($_GET['id']){
        $article = $db->getArticle($_GET['id']);
    }

    if(!$article){
        redirect('./article_404.php');
    }
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
    <main>
        <section>
            <div class="container">
                <article class="full-view-article">
                    <h2><?= $article->getTitle() ?></h2>
                    <p class="content">
                        <?= $article->getContent(); ?>
                    </p>
                </article>
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