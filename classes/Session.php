<?php
    class Session
    {
        public function __construct(){
            session_start();
        }

        /**
         * Creates a new session and assigns a User object to $_SESSION['user'];
         */
        public function logIn(User $user, $remember = false, $time = null):? User{
            $_SESSION['user'] = $user;

            if($remember){
                if(!$time){    
                    $time = time() + 3600 * 24 * 7 * 2;
                }
                setcookie('username',json_encode($user->getUsername()),$time);
                setcookie('email',json_encode($user->getEmail()),$time);
            }

            return $this;
        }
        
        /**
         * Keeps the session open, expects a UNIX time sesion lenght.
         */
        public function keepOpen(Database $db, $time = null){
            if(isset($_COOKIE['username']) && !isset($_SESSION['user'])){
                $username = readCookie('username', true);
                $_SESSION['user'] = $db->getUser($username);
            }
        }
    
        /**
         * Reads the content of a given field on the cookie and 
         */
        private function readCookie($field){
            if(isset($_COOKIE[$field])){
                if(json_decode($_COOKIE[$campo]) !== null){
                    return json_decode($_COOKIE[$campo]);
                }
            }            
        }

        /**
         * Destroys the session
         */
        public function logOut(){
            session_destroy();
        }
    
    }
?>