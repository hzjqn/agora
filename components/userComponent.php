<?php
function getUser($username){
    $users = fopen('./users.json', "r");
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

                    fclose($users);
                    return $userData;
                }
            }
        }

        fclose($users);
        return false;
}

function getUserByEmail($email){
    $users = fopen('./users.json', "r");
        // Recorrer linea por linea y comparar user
        while (($linea = fgets($users)) !== false){
            $foundUser = json_decode($linea, true);
            if(isset($foundUser['email'])){
                // Si el user coincide
                if($foundUser['email'] === $email){
                    // Creamos un array con todos los datos del user excepto la contraseña.
                    $userData = [
                        'username' => $foundUser['username'],
                        'name' => $foundUser['name'],
                        'lastname' => $foundUser['lastname'],
                        'email' => $foundUser['email'],
                        'pp' => $foundUser['pp']
                    ];

                    fclose($users);
                    return $userData;
                }
            }
        }

        fclose($users);
        return false;
}

function registerUser($user){
    $user['pp'] = null;    
    file_put_contents('./users.json', json_encode($user).PHP_EOL,FILE_APPEND);
}


?>