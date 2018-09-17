<?php
function getUserData($username){
    $users = fopen('./db/users.json', "r");
        // Recorrer linea por linea y comparar user
        while (($linea = fgets($users)) !== false){
            $foundUser = json_decode($linea, true);
            if(isset($foundUser['username'])){
                // Si el user coincide
                if($foundUser['username'] === $username){
                    // Creamos un array con todos los datos del user excepto la contraseña.
                    $userData = [
                        'username' => $foundUser['username'],
                        'name' => $foundUser['name'],
                        'lastname' => $foundUser['lastname'],
                        'email' => $foundUser['email'],
                        'pp' => $foundUser['pp']
                    ];
                    break;
                }
            }
        }

        fclose($users);
        return $userData;
}
?>