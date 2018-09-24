<?php
class User 
{
    private $username;
    private $password;
    private $email;
    private $name;
    private $lastname;
    private $pp;

    public function __construct(string $username, string $password, string $email, string $name = null, string $lastname = null, string $pp = null){
        $this
            ->setUsername($username)
            ->setPassword($password)
            ->setEmail($email)
            ->setName($name)
            ->setLastname($lastname)
            ->setPp($pp);
    }

    /**
     * Get the json_decode() from a User Object
     */
    public function getJson(){
        $array = [
            'username' => $this->getUsername(),
            'password' => password_hash($this->getPassword(), PASSWORD_DEFAULT), 
            'email' => $this->getEmail(),
            'name' => $this->getName(), 
            'lastname' => $this->getLastname(), 
            'pp' => $this->getPp()
        ];
        return json_encode($array);
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
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

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
    public function getPp()
    {
        return $this->pp;
    }

    /**
     * Set the value of birthday
     *
     * @return  self
     */ 
    public function setPp($pp)
    {
        $this->pp = $pp;

        return $this;
    }
}
?>