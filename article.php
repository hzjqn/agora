<?php
    require_once './fn.php';
    $tituloPagina = "Ágora: Explora. Expresa. Se parte"; // Esta variable cambia el titulo de la pagina

    if($_GET['id']){
        $article = $db->getArticle($_GET['id']);
        $comments = $article ? $db->getAllCommentsOnArticle($article->getId()) : null;
        $author = $db->getUserById($article->getAuthorId());
    }

    if(!$article){
        redirect('./article_404.php');
    }

    if($_POST){
        
        $errors = Validation::validateComment($_POST);

        if(!$errors){
            $comment = $db->createComment($_POST);
            redirect('./article?id='.$article->getId().'#comment_'.$comment->getId());
            exit;
        }
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
                        Publicado por<br>
                        <h4><?=$author->getName() . ' ' . $author->getLastName() ?></h4>
                        <a href="./profile.php?id=<?=$author->getId()?>">@<?=$author->getUsername() ?></a>
                        <form action="follow.php" method="post">
                            <input type="submit" value="Seguir">
                        </form>
                    </div>
                </div>
            </aside>
            <main id="article" class="col-md-8 col-sm-12 order-1 order-md-2">
                <section>
                    <article class="full-view-article">
                        <header>    
                            <h2><?= $article->getTitle() ?></h2>
                        </header>
                        <main class="content">
                            <h3><?= $article->getContent(); ?>
                        </main>
                    </article>
                </section>
                
                <aside class="row">
                    <section class="col-12" id="comments">
                        <header>    
                            Comentarios
                        </header>
                        <?php
                            if($comments == null){
                                $comments = [];
                            }
                            foreach($comments as $coment) { ?>
                            <article class="card" id="comment_<?= $coment->getId() ?>">
                                <?= $coment->getContent(); ?>
                            </article>
                        <?php } ?>

                        <?php if(check()){ ?>
                            <form action="" class="comment-form" method="post">
                                <input type="number" value="<?= $_SESSION['user']->getId() ?>" style="visibility: hidden; display:none"  name="comment_user_id">
                                
                                <input type="number" value="<?=$article->getId() ?>" style="visibility: hidden; display:none" name="comment_article_id">

                                <input type="textarea" name="comment_content">
                                <input type="submit" class="comment-btn" value="Comentar">
                            </form>
                        <?php } ?>
                    </section>
                </aside>
            </main>
        </div>
    </div>
    <?php 
    include('./join.php');
    include('./footer.php');
    include('./js.php');
    ?>
</body>
</html>