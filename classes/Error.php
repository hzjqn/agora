<?php
    class Err {

        // Log in errors:
        const LOGIN_USERNAME_NULL = "Debes ingresar tu nombre de usuario";
        const LOGIN_PASSWORD_NULL = "Debes ingresar tu contraseña";
        const LOGIN_USERNAME = "No existen cuentas de Agora asociadas a ese email o nombre de usuario. Quizas quieras<a href='register.php'>registrarte</a>";
        const LOGIN_PASSWORD = "El usuario y contraseña ingresados son incorrectos.";
        
        // Register errors:

        // UsernameREG_USERNAME_CONTAINS_SPACES
        const REG_USERNAME_NULL = "Debes elegir un nombre de usuario.";
        const REG_USERNAME_TOO_SHORT = "El nombre de usuario elegido es demasiado corto, debe contener 3 caracteres o mas.";
        const REG_USERNAME_TOO_LONG = "El nombre de usuario elegido es demasiado largo, debe contener 16 caracteres o menos.";
        const REG_USERNAME_TAKEN = "El nombre de usuario elegido ya esta siendo utilizado, elije otro.";

        // Password
        const REG_PASSWORD_NULL = 'Debes elegir una contraseña.';
        const REG_PASSWORD_TOO_SHORT = 'La constraseña introducida es demasiado corta, debe tener 8 caracteres o mas.';
        const REG_PASSWORD_TOO_WEAK = 'La contraseña elegida es demasiado debil, debe contener almenos un caracter numerico, una minuscula y una mayuscula';

        // eMail
        const REG_EMAIL_INVALID = "El email elegido no es valido";
        const REG_EMAIL_IS_BEING_USED = "El email elegido ya esta en uso. Quizas estas buscando <a href='login.php'>iniciar sesion<a>?";

        // Name
        const REG_NAME_NULL = "Debes completar este campo.";
        const REG_LASTNAME_NULL = "Debes completar este campo";
    }
?>