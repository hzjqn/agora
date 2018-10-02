<?php
    require_once './classes/Error.php';
    
    abstract class Validation
    {

        /**
         * Validates user/password combinations in a given database. Returns true when the combination is correct and and an array of errors if it isn't.
        */
        public static function validateLogin(Database $db, string $username, string $password){
            $foundUser = $db->getUser($username);
            if($foundUser){
                if(password_verify($password, $foundUser->getPassword())){
                    return false;
                }

                else {
                    $errors['passowrd'] = Err::LOGIN_PASSWORD; 
                }
            } else {
                $errors['username'] = Err::LOGIN_USERNAME;
            }            
            return $errors;
            // si el user no coincide error : username
        }
        
        /**
         * Validates user registry data entries. Requires a User object.
        */    
        public static function validateRegister(Database $db, User $user){
            
            // $user deberia ser una array con todos los atributos. Tambien podemos pasar directamente $_POST si armamos el formulario correctamente.
            $username = trim($user->getUsername(), " \t\n\r\0\x0B");
            $password = $user->getPassword();
            $name =  $user->getName();
            $lastname = $user->getLastname();
            $email = $user->getEmail();
            $errors = [];
    
            
            // Checkeamos el username;
            if($username != $user->getUsername()){// Si tenía espacios devolvemos error.
                $errores['username'] = Err::REG_USERNAME_CONTAINS_SPACES;
            } else if ($username == null){ // Checkeamos que no haya venido vacio.
                $errors['username'] = Err::REG_USERNAME_NULL;
            } else if (strlen($username) < 3){ // Segundo checkeamos que el username contenga 3 o mas caracteres.
                $errors['username'] = Err::REG_USERNAME_TOO_SHORT;
            } else if (strlen($username) > 16){ // Segundo checkeamos que el username contenga 16 o menos caracteres.
                $errors['username'] = Err::REG_USERNAME_TOO_LONG;
            } else if ($db->getUser($username)){
                $errors['username'] = Err::REG_USERNAME_TAKEN;
            }
    
            // Checkeamos la password
            if($password == null){
                $errors['password'] = Err::REG_PASSWORD_NULL;
            } else if(strlen($password) < 8){ // Si la password tiene menos de 8 caracteres;
                $errors['password'] = Err::REG_PASSWORD_TOO_SHORT;
            } else if ($password == strtolower($password) || $password == strtoupper($password) || $password == trim($password, '1234567890')){ // Si la password no tiene numeros
                $errors['password'] = Err::REG_PASSWORD_TOO_WEAK;
            }
    
            // Checkeamos el email
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = Err::REG_EMAIL_INVALID;
            } else if ($db->getUser($email)){
                $errors['email'] = Err::REG_EMAIL_IS_BEING_USED;
            }
    
            // Checkeamos el nombre que no este vacio nomas
            if($name == null){
                $errors['name'] = Err::REG_NAME_NULL;
            }
    
            // Checkeamos el apellido que no este vacio nomas
            if($lastname == null){
                $errors['lastname'] = Err::REG_LASTNAME_NULL;
            }
    
            // Retornamos el array de errores;
            return $errors;
        }
    }
?>