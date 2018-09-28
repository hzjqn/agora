<?php
    class JSONFile extends Database 
    {
        private $path;

        public function __construct(string $path){
            $this->setPath($path);
        }

        /**
         * Get the value of path
         */ 
        public function getPath()
        {
                return $this->path;
        }

        /**
         * Set the value of path
         *
         * @return  self
         */ 
        public function setPath($path)
        {
                $this->path = $path;

                return $this;
        }
        /**
         * Returns a User object with user data from db, expects a username string or a email string from a registered user.
         */
        public function getUser($usernameOrEmail){
            $file = json_decode(file_get_contents($this->path), true);
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
         * Gets an array of User objects from this database
         */
        public function getUsers(){

        }

        /**
         * Registers a user in the DB. Expects a User object
         */
        public function createUser(User $user){
            $file = json_decode(file_get_contents($this->path), true);
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

        /**
         * Changes user data from the db, expects a user id and the value from each changed attribute.
         */
        public function changeUser(int $userId, ...$changes){
            $file = json_decode(file_get_contents($this->path), true);
            foreach($file['users'] as $key => $user){
                if($userId === $user['id']){
                    $foundUSer = $user;
                    break;
                }
            }
            foreach($changes as $change => $newValue){
                
            }
        }

        /**
         * Deletes a user from the db, expects a user id
         */
        public function deleteUser(int $userId){
            $file = json_decode(file_get_contents($this->path), true);
            foreach ($file['users'] as $key => $currentUser){
                if($currentUser['id'] === $userId){
                    unset($file['users'][$key]);
                }
            }
            file_put_contents($this->url,json_encode($file));
            return true;
        }
    }
?>