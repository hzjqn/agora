<?php
    class JSONFile extends Database 
    {
        private $url;

        public function __construct(string $url){
            $this->setUrl($url);
        }

        /**
         * Get the value of url
         */ 
        public function getUrl()
        {
                return $this->url;
        }

        /**
         * Set the value of url
         *
         * @return  self
         */ 
        public function setUrl($url)
        {
                $this->url = $url;

                return $this;
        }

        public function getUser($usernameOrEmail){
            $file = fopen($this->url,'r+')
            
            while (($line = fgets($file)) != false){
                $currentUser = json_decode($line);
                if(isEmail($usernameOrEmail)){
                    if($usernameOrEmail == $currentUser->$email){
                        $newUser = new User($currentUser->id, $currentUser->username, $currentUser->password);
                        return $newUser;
                    }
                } else {
                    if($usernameOrEmail == $currentUser->$username){
                        $newUser = new User($currentUser->id, $currentUser->username, $currentUser->password);
                        return $newUser;
                    }
                }
            }
        }
    } 
?>