<?php
    require_once './fn.php';
    
    $tituloPagina = "Ágora: Explora. Expresa. Se parte"; // Esta variable cambia el titulo de la pagina
    $db = new JSONFile();
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
    <header id="profile-header">
        <div class="container">
            <div class="pp">
                <img src="img/<?=$_SESSION['user']->getProfilePhoto()?>pp.png" alt="{{user.name user.lastname}}" class="pp-img">
            </div>
            <div class="profile-info">
                <h2><?=$_SESSION['user']->getName() . ' ' . $_SESSION['user']->getLastname()?></h2>
            </div>
            </section>
        </div>
    </header>
    <main>
        <section id="features" class="content-wall">
            <?php foreach ($db->getAllArticlesByUser($_SESSION['user']->getUsername()) as $post){ ?>
                <article class="post card">
                    <h3><?= $post['title']?></h3>
                    <div class="content"><?= $post['content']?></div>
                    <button class="see-more">
                        +
                    </button>
                </article>
            <?php } ?>
        </section>
    </main>
    <?php 
    include('./footer.php');
    include('./js.php');
    ?>
</body>
</html>