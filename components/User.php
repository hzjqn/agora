<?php
class User 
{
    private $id;
    private $username;
    private $password;
    private $name;
    private $lastname;
    private $birthday;

    public function __construct(string $id, string $username, string $password, string $name = null, string $lastname = null, string $birthday = null){
        $this->setId($id);
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setName($name);
        $this->setLastname($lastname);
        $this->setBirthday($birthday);
    }

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

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of birthday
     */ 
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set the value of birthday
     *
     * @return  self
     */ 
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }
}
?>