<?php
    require_once './fn.php';
    
    $tituloPagina = "Ágora: Explora. Expresa. Se parte"; // Esta variable cambia el titulo de la pagina
    $db = new JSONFile();
    if(isset($_SESSION['user'])){
        if($_POST){
            $valid = Validation::validateArticle($_POST);
            if($valid){
                $db->createArticle(['title' => $_POST['title'], 'content' => $_POST['content'], 'authorId' => $_SESSION['user']->getId()]);
            }
        }
    } else {
        redirect("./login.php?rta=$_GET[id]");
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
                <input type="text" name="title">
                <input type="text" name="content">
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