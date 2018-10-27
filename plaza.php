<?php
    require_once './fn.php';
    $tituloPagina = 'Agora: Plaza';
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
    <header id="landing-header" class="not-fullscreen">
        <div class="container">
            <h2>Lo que la comunindad está compartiendo en ágora</h2>
        </div>
    </header>
    <main>
        <div class="container">
        <?php $allarticles = $db->getAllArticles();
            if($allarticles){
                foreach($allarticles as $article){?>
                    <article class="profile-article card">
                        <h3><?=$article->getTitle()?></h3>
                        <div class="content">
                            <?=$article->getContent() ?>
                        </div>
                        <a href="article.php?id=<?=$article->getId() ?>">+</a>
                    </article>
        <?php   }
            } else {
                echo '<span class="m-5" style="display:block;">No se han publicado notas</span>';
            }
        ?>

        
        </div>
    </main>
    <?php
    include('./join.php');
    include('./footer.php');
    include('./js.php');
    ?>
</body>
</html>