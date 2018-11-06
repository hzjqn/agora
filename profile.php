<?php
    require_once './fn.php';
    
    $tituloPagina = "Ágora: Explora. Expresa. Se parte"; // Esta variable cambia el titulo de la pagina

    if(isset($_GET['id'])){
        $user = $db->getUserById($_GET['id']);
        if($user == null){
            redirect('./');
        }
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
    <div class="container">
        <div class="row">
            <aside id="autor" class="col-md-4 col-sm-12 order-2 order-md-1">
                <div class="author-profile">
                    <div class="author-profile-header">
                        <div class="profile-pp"><img src="img/<?= $user->getProfilePhoto() ? $user->getProfilePhoto() : 'pp.png' ?>" alt=""></div>
                        <h4><?=$user->getName() . ' ' . $user->getLastName() ?></h4>
                        <a href="./profile.php?id=<?=$user->getId()?>">@<?=$user->getUsername() ?></a>
                        <form action="follow.php" method="post">
                            <input type="submit" value="Seguir">
                        </form>
                    </div>
                </div>
            </aside>
            <main id="article" class="col-md-8 col-sm-12 order-1 order-md-2">
                <section>
                    <article class="full-view-article">
                        <?php if(isset($user)){ ?>
                            <?php if($db->getAllArticlesByUser($user->getId())) { ?>
                                <?php foreach($db->getAllArticlesByUser($user->getId()) as $article){?>
                                    <article class="profile-article card">
                                        <a href="article?id=<?=$article->getId() ?>">
                                            <h3><?=$article->getTitle()?></h3>
                                        </a>
                                    </article>
                                <?php } ?>
                            <?php } else {
                                echo "Este usuario no ha publicado ningun articulo";
                            } ?>
                        <?php } ?>
                    </article>
                </section>
            </main>
        </div>
    </div>
    <?php
    include('./footer.php');
    include('./js.php');
    ?>
</body>
</html>