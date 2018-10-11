<?php
    class MySQL extends Database
    {
        private $db;
        private $dbname;
        private $dbuser;
        private $dbpassword;
        private $host;
        private $charset;

        public function __construct(string $dbname = 'agora', string $dbuser = 'root', string $dbpassword = 'root', string $host = 'localhost', string $charset = 'utf8mb4'){
            $this->dbname = $dbname;
            $this->dbuser = $dbuser;
            $this->dbpassword = $dbpassword;
            $this->host = $host;
            $this->charset = $charset;

            $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=$this->charset";
            $user = $this->dbuser;
            $password = $this->dbpassword;

            try{    
                $this->db = new PDO($dsn, $user, $password);
            } catch (PDOException $e) {
                echo '<script language="javascript">';
                echo 'alert("' . $e->getMessage() . '")';
                echo '</script>';
            }
        }


        /**
         * Returns a User object with user data from db, expects a username string or a email string from a registered user.
         */
        public function getUser(string $usernameOrEmail){
            
            $query = $this->db->prepare('select * from users where username like :username or email like :email');
            $query->bindValue(':username', "$usernameOrEmail");
            $query->bindValue(':email', "$usernameOrEmail");

            try{
                $query->execute();
            } catch(PDOException $e) {
                echo '<script language="javascript">';
                echo 'alert("' . $e->getMessage() . '")';
                echo '</script>';
            }

            $result = $query->fetch(PDO::FETCH_ASSOC);

            if($result){
                $user = new User($result['username'], $result['password'], $result['email']);
                return $user;
            } else {
                return false;
            }
        }
       
        /**
         * Gets an array of User objects from this database
         */
        public function getUsers(){
            $query = $this->db->prepare('SELECT * FROM users');
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach($result as $key => $foundUser){    
                $users[] = new User($foundUser['username'],$foundUser['password'],$foundUser['email'],$foundUser['name'], $foundUser['lastname'], $foundUser['profilePhoto'],$foundUser['id']);
            }
            return $users;
        }

        /**
         * Registers a user in the DB. Expects a User object
         */
        public function createUser(array $user){
            
            
            // seteamos las variables con sus valores correspondientes.
            $username = $user['username'];
            $password = password_hash($user['password'], PASSWORD_DEFAULT);
            $email = $user['email'];
            $name = $user['name'];
            $lastname = $user['lastname'];
            
            // preparamos la query y la bindeamos a las variables correspondientes.
            $query = $this->db->prepare('INSERT INTO `users`(`id`, `username`, `password`, `email`, `name`, `lastname`, `profilePhoto`, `joinedAt`, `lastUpdate`) VALUES (DEFAULT,:username,:pass,:email,:name,:lastname,null,now(),now())');

            // hacemos param binding
            $query->bindParam(':username', $username);
            $query->bindParam(':pass', $password);
            $query->bindParam(':email', $email);
            $query->bindParam(':name', $name);
            $query->bindParam(':lastname', $lastname);
            
            try{
                $query->execute();
            } catch (PDOException $e) {                
                echo '<script language="javascript">';
                echo 'alert("' . $e->getMessage() . '")';
                echo '</script>';
                return false;
            }

            return true;
        }

        /**
         * Changes user data from the db, expects a user id and the value from each changed attribute.
         */
        public function changeUser(int $userId, ...$changes){
        }

        /**
         * Deletes a user from the db, expects a user id
         */
        public function deleteUser(int $userId){
        }
    }