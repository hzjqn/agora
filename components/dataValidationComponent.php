<?php
    function validateLogin($user, $password){
        // Abrir el archivo users.json
        $users = fopen('./db/users.json', "r");
        // Recorrer linea por linea y comparar user
        while (($linea = fgets($users)) !== false){
            $founduser = json_decode($linea, true);
            if(isset($founduser['username'])){
                // Si el user coincide checkear password
                if($founduser['username'] === $user){
                    // Si la contraseña no coincide error: passowrd
                    if(password_verify($password, $founduser['password'])){
                        $errors = [];
                    } else {
                        $errors['password'] = 'La contraseña ingresada no es la correcta';
                    }
                } else {
                    $errors['username'] = 'No se ha encontrado ningun usuario con ese nombre';
                }
            }
        }

        fclose($users);
        return $errors;


        // si el user no coincide error : username
    }

?>