<?php
    require_once './fn.php';
    
    $tituloPagina = "Ágora: Explora. Expresa. Se parte"; // Esta variable cambia el titulo de la pagina
    $db = new JSONFile();
    if(isset($_SESSION['user'])){
        if($_POST){
            $errors = Validation::validateArticle($_POST);
            
            if(!$errors){
               $newArticle = $db->createArticle(['title' => $_POST['title'], 'content' => $_POST['content'], 'authorId' => $_SESSION['user']->getId()]);
               redirect('./article.php?id='.$newArticle->getId());
            }
        }
    } else {
        redirect("./login.php?rta=$_GET[id]");
        exit;
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
        <section id="features" class="content-wall">
            <form action="" method="post">
                <label for="name">Titulo</label>
                <input class="<?= isset($errors['title']) ? 'error' : ''?>" type="text" name="title" placeholder="Titulo" value="<?= old('title') ?>">
                <?= isset($errors['title']) ? "<span class='error-span'>".$errors['title']."</span>" : ''?>
                <label for="name">Contenido</label>
                <input class="<?= isset($errors['content']) ? 'error' : ''?>" type="text" name="content" placeholder="Contenido" value="<?= old('content') ?>">
                <?= isset($errors['content']) ? "<span class='error-span'>".$errors['content']."</span>" : ''?>
                <input type="submit" value="Publicar">
            </form>
        </section>
    </main>
    <?php 
    include('./footer.php');
    include('./js.php');
    ?>
</body>
</html>