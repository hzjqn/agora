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
        /**
         * Gets a user, expects a username or a email string.
         */
        public function getUser($usernameOrEmail){
            $file = fopen($this->getUrl(),'r+');            
            while (($line = fgets($file, 1)) != false){
                $currentUser = json_decode($line);
                if(isEmail($usernameOrEmail)){
                    if($usernameOrEmail == $currentUser->$email){
                        $newUser = new User($currentUser->id, $currentUser->username, $currentUser->password);
                        return $newUser;
                    }
                    return false;
                } else {
                    if($usernameOrEmail == $currentUser->$username){
                        $newUser = new User($currentUser->id, $currentUser->username, $currentUser->password);
                        return $newUser;
                    }
                    return false;
                }
            }
        }
        public function registerUser(User $user){
            $file = fopen($this->getUrl(), 'a');
            fwrite($file, $user->getJson().PHP_EOL);
            fclose($file);
        }
    }
?>