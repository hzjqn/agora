<?php
    // En el caso de querer agregar errores usar siempre constantes y nombres 
    /**
     * Class para agrupar todos los mensajes de error para mejor mantenimiento y escalabilidad.
     */
    abstract class Err 
    {

        // Log in errors:
            const LOGIN_USERNAME_NULL = "Debes ingresar tu nombre de usuario";
            const LOGIN_PASSWORD_NULL = "Debes ingresar tu contraseña";
            const LOGIN_USERNAME_NOT_FOUND = "No existen cuentas de Agora asociadas a ese email o nombre de usuario. Quizas quieras<a href='register.php'>registrarte</a>";
            const LOGIN_PASSWORD_VALIDATION_FALSE = "El usuario y contraseña ingresados son incorrectos.";
            
        // Register errors:
            // Username
                const REG_USERNAME_CONTAINS_INVALID_CHARS = "El nombre de usuario elegido contiene caracteres invalidos. Solo debes usar letras, guiones y numeros.";
                const REG_USERNAME_NULL = "Debes elegir un nombre de usuario.";
                const REG_USERNAME_TOO_SHORT = "El nombre de usuario elegido es demasiado corto, debe contener 3 caracteres o mas.";
                const REG_USERNAME_TOO_LONG = "El nombre de usuario elegido es demasiado largo, debe contener 16 caracteres o menos.";
                const REG_USERNAME_TAKEN = "El nombre de usuario elegido ya esta siendo utilizado, elije otro.";

            // Password
                const REG_PASSWORD_NULL = 'Debes elegir una contraseña.';
                const REG_PASSWORD_TOO_SHORT = 'La constraseña introducida es demasiado corta, debe tener 8 caracteres o mas.';
                const REG_PASSWORD_TOO_WEAK = 'La contraseña elegida es demasiado debil, debe contener almenos un caracter numerico, una minuscula y una mayuscula';

            // Email
                const REG_EMAIL_INVALID = "El email elegido no es valido";
                const REG_EMAIL_IS_BEING_USED = "El email elegido ya esta en uso. Quizas estas buscando <a href='login.php'>iniciar sesion<a>?";

            // Name
                const REG_NAME_NULL = "Debes completar este campo.";
                const REG_LASTNAME_NULL = "Debes completar este campo";
        
        // Article submition errors: 
            // Title
                const ARTICLE_TITLE_TOO_LONG = "El titulo ingresado es demasiado largo. Debe contener 128 caracteres o menos";
                const ARTICLE_TITLE_TOO_SHORT = "El titulo ingresado es demasiado corto. Debe contener 4 caracteres o más";
                const ARTICLE_TITLE_NULL = "Debes ingresar un titulo";
            
            // Content
                const ARTICLE_CONTENT_TOO_LONG = "El articulo ingresado es demasiado largo. Debe contener 32000 caracteres o menos.";
                const ARTICLE_CONTENT_NULL = "Debes ingresar un contenido";
            
    }


?>