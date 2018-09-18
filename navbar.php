<nav class="navbar fixed-top navbar-expand-lg navbar-agora">
    <div class="container">
    <a class="navbar-brand" href="./index.php"><h1 class="logo"><i class="agora-logo">ágora</i></h1></a>
    
    <?php
        session_start();
        
        if(isset($_POST['logout']) && $_POST['logout'] === 'true'){
            session_destroy();
            header("Refresh:0");
        }

        if(!isset($_SESSION['user'])){
    ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="icon-bar"></i>
        <i class="icon-bar"></i>
        <i class="icon-bar"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link log" href="./login.php">Iniciar Sesión</a>
            </li>
            <li class="nav-item spacer">
            </li>
            <li class="nav-item">
                <a class="nav-link reg" href="./register.php">Registrarse</a>
            </li>
        </ul>
    <?php } else {?>
        <div class="ml-auto">
            <h2><?=$_SESSION['user']['username']?></h2><img class="navbar-pp" src="img/<?= $_SESSION['user']['pp']."pp.png" ?>" alt="asdf"><form method="post"><button type="submit" name="logout" value="true" ><i class="fas fa-sign-out-alt"></i></button></form>
        </div>
    <?php } ?>
    </div>
    </div>
</nav>