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
                $user = new User($result['username'], $result['password'], $result['email'],$result['name'], $result['lastname'], $result['profilePhoto'], $result['id']);
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
         * Gets a User object from an user Id from DB;
         */
        public function getUserById(int $id){
            $query = $this->db->prepare('SELECT * FROM `users` WHERE `id` LIKE :id');

            $query->bindParam(':id', $id);

            try {
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC)[0];
            } catch (PDOException $e){           
                echo '<script language="javascript">';
                echo 'alert("' . $e->getMessage() . '")';
                echo '</script>';
                return false;
            }
            return new User($result['username'], $result['password'], $result['email'], $result['name'], $result['lastname'], $result['profilePhoto'], $result['id']);   
        }
        
        public function getArticle(int $id){

            $query = $this->db->prepare('SELECT * FROM `articles` WHERE `id` = :id');
            $query->bindParam(':id', $id);
            try{
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC)[0];

            } catch(PDOException $e){
                echo '<script language="javascript">';
                echo 'alert("' . $e->getMessage() . '")';
                echo '</script>';
                return false;
            }
            return new Article($result['id'], $result['title'], $result['content'], $result['author_id']);
        }
        
        public function getAllArticles(){
            $query = $this->db->prepare('SELECT * FROM `articles`');
            try{
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                echo '<script language="javascript">';
                echo 'alert("' . $e->getMessage() . '")';
                echo '</script>';
                return false;
            }
            
            $return = [];
            
            foreach($result as $article){
                $return[] = new Article($article['id'], $article['title'], $article['content'], $article['author_id']);
            }
            
            return $return;
        }
        
        public function getAllArticlesByUser($authorId){
            $query = $this->db->prepare('SELECT * FROM `articles` WHERE `author_id` LIKE :id');
            $query->bindParam(':id', $authorId);
            try{
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo '<script language="javascript">';
                echo 'alert("' . $e->getMessage() . '")';
                echo '</script>';
                return false;
            }
            
            $return = [];
            
            foreach($result as $article){
                $return[] = new Article($article['id'], $article['title'], $article['content'], $article['author_id']);
            }
            
            return $return;
        }
        
        public function createArticle(array $article){
            
            
            // seteamos las variables con sus valores correspondientes.
            $title = $article['title'];
            $content = $article['content'];
            $authorId = $article['authorId'];
            
            // preparamos la query y la bindeamos a las variables correspondientes.
            $query = $this->db->prepare('
            INSERT INTO `articles`(`id`, `title`, `content`, `author_id`, `created_at`, `updated_at`) 
            VALUES (DEFAULT,:title,:content,:authorId,now(),now());');
            
            // hacemos param binding
            $query->bindParam(':title', $title);
            $query->bindParam(':content', $content);
            $query->bindParam(':authorId', $authorId);
            
            try{
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {                
                echo '<script language="javascript">';
                echo 'alert("' . $e->getMessage() . '")';
                echo '</script>';
                return false;
            }
            $newArticle = $this->getArticle($this->db->lastInsertId());
            var_dump($newArticle);           
            return $newArticle;
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
            $query = $this->db->prepare('DELETE FROM `users` WHERE `id` LIKE :id');
            $query->bindParam(':id', $userId);
            try{
                $query->execute();
            } catch(PDOException $e){
                echo '<script language="javascript">';
                echo 'alert("' . $e->getMessage() . '")';
                echo '</script>';
                return false;
            }
            return true;
        }
        
        public function changeArticle(int $articleId, ...$changes){

        }
        public function deleteArticle(int $userId){

        }
    }