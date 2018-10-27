<?php
    require_once './fn.php';
    
    $tituloPagina = "Ágora: Explora. Expresa. Se parte"; // Esta variable cambia el titulo de la pagina

    if(isset($_GET['id'])){
        $user = $db->getUserById($_GET['id']);
    } else {
        if(!isset($_SESSION['user'])){
            redirect('./login.php?r=profile');
        }
        $user = $db->getUserById($_SESSION['user']->getId());
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
    <header id="profile-header">
        <div class="container">
            <img src="img/<?= $user->getProfilePhoto() ?>pp.png" alt="<?= $user->getUsername() ?>">
            <h2><?= $user->getName() ?> <?= $user->getLastname() ?></h2>
        </div>
    </header>
    <main>
        <div class="container">
            
        <?php if(isset($user))foreach($db->getAllArticlesByUser($user->getId()) as $article){?>
            <article class="profile-article card">
                <h3><?=$article->getTitle()?></h3>
                <div class="content">
                    <?=$article->getContent() ?>
                </div>
                <a href="article?id=<?=$article->getId() ?>">+</a>
            </article>
        <?php } ?>
        </div>
    </main>
    <?php
    include('./footer.php');
    include('./js.php');
    ?>
</body>
</html>