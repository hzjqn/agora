<?php
    require_once './fn.php';

    $tituloPagina = "Ágora | Iniciar Sesion"; // Esta variable cambia el titulo de la pagina
    $db = new JSONFile();
    
    if(isset($_SESSION['user']) && $_SESSION != null){
        header('Location: ./index.php');
        session_destroy();
        exit;
    }
    
    if($_POST){    
        if((isset($_POST['username']) && $_POST['username'] != null) && (isset($_POST['password']) && $_POST['username'] != null)){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $errors = Validation::validateLogin($db, $username, $password);

            if(!$errors){
                $user = $db->getUser($username);
                $_SESSION['user'] = $user;
            }
            
            if(isset($_SESSION['user'])){
                if($_GET['rta'] !== null){
                    redirect("./article?id=$_GET[id]");
                } else if($_GET['r'] !== null){
                    redirect("./".$_GET['r'].".php");
                }  else {
                    header('Location: ./profile.php');
                }
            exit;
            }

        } else {
            $errors['username'] = Err::LOGIN_USERNAME_NULL;
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php        
        require_once("./header.php"); // Incluimos el header (Tags html y head, incluyendo los archivos css) ver "header.php"
    ?>
</head>
<body>
    <?php # require_once('./navbar.php'); ?> <!-- INCLUIMOS EL NAVBAR -->
    
    <!-- MAIN -->
    <main>
        <!-- SECCION LOGIN -->
        <section id="login">
            <!-- FORMULARIO DE INICIO DE SESIÓN -->
            <form method="post" id="login-form">
                <?php
                if(isset($errors)){foreach($errors as $value){
                    echo $value;
                }} ?>
                <input type="text" name="username" placeholder="Nombre de usuario o dirección de correo electronico">
                <input type="password" name="password" placeholder="Contraseña">
                <input type="checkbox" name="remember" value="true"><label for="remember">Recordar</label>
                <input type="submit" value="Iniciar Sesión">
                <p class="desc mt-4">
                    <a href="recover.php">No recuerdo mi contraseña</a> | <a href="recover-email.php">No recuerdo mi usuario</a>
                </p>
            </form>
        </section>
    </main>
    <!-- TERMINA MAIN -->

    <?php
    require_once("./footer.php"); 
    require_once("./js.php");
    ?>
</body>
</html>