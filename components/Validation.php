<?php
    abstract class Validation{

        /**
         * Validates user/password combinations in a given database. Returns true when the combination is correct and and an array of errors if it isn't.
        */
        public static function validateLogin(Database $db, string $username, string $password){
            $foundUser = $db->getUser($username);
            if($foundUser){
                if(password_verify($password, $foundUser->getPassword())){
                    return true;
                }

                else {
                    $errors['passowrd'] = 'La contraseña ingresada no es la correcta'; 
                }
            } else {
                $errors['username'] = 'No se ha encontrado ningun ususario con ese nombre';
            }
            
            return $errors;
            // si el user no coincide error : username
        }
        
        /**
         * Validates user registry data entries. Requires a User object.
        */    
        public static function validateRegister(User $user){
            
            // $user deberia ser una array con todos los atributos. Tambien podemos pasar directamente $_POST si armamos el formulario correctamente.
            $username = trim($user['username'], " \t\n\r\0\x0B");
            $password = $user['password'];
            $name = $user['name'];
            $lastname = $user['lastname'];
            $email = $user['email'];
            $errors = [];
    
            
            // Checkeamos el username;
            if($username != $user['username']){// Si tenía espacios devolvemos error.
                $errores['username'] = "Tu nombre de usuario no debe contener espacios.";
            } else if ($username == null){ // Checkeamos que no haya venido vacio.
                $errors['username'] = "Debes elegir un nombre de usuario.";
            } else if (strlen($user['username']) < 3){ // Segundo checkeamos que el username contenga 3 o mas caracteres.
                $errors['username'] = "Tu nombre de usuario es demasiado corto. Debe contener al menos 3 caractéres.";
            } else if (strlen($user['username']) > 16){ // Segundo checkeamos que el username contenga 16 o menos caracteres.
                $errors['username'] = "Tu nombre de usuario es demasiado largo. Debe contener 16 caractéres o menos.";
            } else if (getUser($username)){
                $errors['username'] = "El nombre de usuario elegido ya ha sido registrado. Probá otro.";
            }
    
            // Checkeamos la password
            if($password == null){
                $errors['password'] = 'Debes elegir una contraseña.';
            } else if(strlen($password) < 8){ // Si la password tiene menos de 8 caracteres;
                $errors['password'] = "La contraseña elegida es demasiado corta. Debe contener al menos 8 caracteres";
            } else if ($password == strtolower($password)) { // Si la password no tiene letras mayusculas
                $errors['password'] = "La constraseña elegida es demasiado debil. Debe contener al menos una letra mayuscula, una letra minuscula y un numero.";
            } else if ($password == strtoupper($password)) { // Si la password no tiene letras minusculas
                $errors['password'] = "La constraseña elegida es demasiado debil. Debe contener al menos una letra mayuscula, una letra minuscula y un numero.";
            } else if ($password == trim($password, '1234567890')){ // Si la password no tiene numeros
                $errors['password'] = "La constraseña elegida es demasiado debil. Debe contener al menos una letra mayuscula, una letra minuscula y un numero.";
            }
    
            // Checkeamos el email
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'La direccion de correo electronico dada no es valida.';
            } else if (getUserByEmail($email)){
                $errors['email'] = 'Ese correo electronico ya esta registrado. Prueba <a href="login.php">iniciar sesión</a>.';
            }
    
            // Checkeamos el nombre que no este vacio nomas
            if($name == null){
                $errors['name'] = 'Debes completar este campo';
            }
    
            // Checkeamos el apellido que no este vacio nomas
            if($lastname == null){
                $errors['name'] = 'Debes completar este campo';
            }
    
            // Retornamos el array de errores;
            return $errors;
        }
    }
?>