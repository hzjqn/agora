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
         * Returns a User object with user data from db, expects a username string or a email string from a registered user.
         */
        public function getUser($usernameOrEmail){
            $file = json_decode(file_get_contents($this->url), true);
            if(isset($file['users'])){
                if(isEmail($usernameOrEmail)){
                    foreach($file['users'] as $user){
                        if($usernameOrEmail === $user['email']){
                            return new User($user['username'],$user['password'],$user['email'],$user['name'],$user['lastname'],$user['profilePhoto'],$user['id']);
                        }
                    }
                } else {
                    foreach($file['users'] as $user){
                        if($usernameOrEmail === $user['username']){
                            return new User($user['username'],$user['password'],$user['email'],$user['name'],$user['lastname'],$user['profilePhoto'],$user['id']);
                        }
                    }
                }
            }
            return false;
        }

        /**
         * Registers a user in the DB. Expects a User object
         */
        public function registerUser(User $user){
            $file = json_decode(file_get_contents($this->url), true);
            $userArray = [
                'username' => $user->getUsername(),
                'password' => password_hash($user->getPassword(), PASSWORD_DEFAULT),
                'email' => $user->getEmail(),
                'name' => $user->getName(),
                'lastname' => $user->getLastname(),
                'profilePhoto' => $user->getProfilePhoto(),
                'id' => $user->getId()
            ];

            if(isset($file['users'])){
                $file['users'][] = $userArray;
            } else {
                $file = ['users'=>[]];
                $file['users'][] = $userArray;
            }
            file_put_contents($this->url,json_encode($file));
            return true;
        }
    }
?>