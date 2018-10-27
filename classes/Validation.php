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
                    $errors['passowrd'] = Err::LOGIN_PASSWORD_VALIDATION_FALSE; 
                }
            } else {
                $errors['username'] = Err::LOGIN_USERNAME_NOT_FOUND;
            }            
            return $errors;
            // si el user no coincide error : username
        }
        
        /**
         * Validates user registry data entries. Requires a User object.
        */    
        public static function validateRegister(Database $db, array $user){
            
            // $user deberia ser una array con todos los atributos. Tambien podemos pasar directamente $_POST si armamos el formulario correctamente.
            $username = trim($user['username'], " \t\n\r\0\x0B");
            $password = $user['password'];
            $name =  $user['name'];
            $lastname = $user['lastname'];
            $email = $user['email'];
            $errors = [];
    
            
            // Checkeamos el username;
            if($username != $user['username']){// Si tenía espacios devolvemos error.
                $errores['username'] = Err::REG_USERNAME_CONTAINS_INVALID_CHARS;
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
        
        /**
         * Validates the data of an Article in array form
¿
         */
        public static function validateArticle($article){

            $errors = null;

            if(strlen($article['title']) > 128){
                $errors['title'] = Err::ARTICLE_TITLE_TOO_LONG;
            } else if (strlen($article['title']) < 4){
                $errors['title'] = Err::ARTICLE_TITLE_NULL;
            } else if ($article['title'] == null){
                $errors['title'] = Err::ARTICLE_TITLE_NULL;
            }

            if(strlen($article['content']) > 320000){
                $errors['content'] = Err::ARTICLE_CONTENT_TOO_LONG;
            } else if ($article['content'] == null){
                $errors['content'] = Err::ARTICLE_CONTENT_NULL;
            }

            if($errors){
                return $errors;
            } else {
                return false;
            }
        }
    }
?>