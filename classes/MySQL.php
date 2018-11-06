<?php
    class MySQL extends Database
    {
        private $db;
        private $dbname;
        private $dbuser;
        private $dbpassword;
        private $host;
        private $charset;

        public function __construct(string $dbname = 'agora_db', string $dbuser = 'root', string $dbpassword = 'root', string $host = 'localhost', string $charset = 'utf8mb4'){
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
                var_dump($result);
                return null;
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
            $query = $this->db->prepare('INSERT INTO `users`(`id`, `username`, `password`, `email`, `name`, `lastname`, `profilePhoto`, `created_at`, `updated_at`) VALUES (DEFAULT,:username,:pass,:email,:name,:lastname,null,now(),now())');

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
                return null;
            }

            return $this->getUser($user['username']);
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
                return null;
            }
            if($result == null){
                return null;
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
                return null;
            }
            return new Article($result['id'], $result['title'], $result['content'], $result['user_id']);
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
                return null;
            }
            
            $return = [];
            
            foreach($result as $article){
                $return[] = new Article($article['id'], $article['title'], $article['content'], $article['user_id']);
            }
            
            return $return;
        }
        
        public function getAllArticlesByUser($authorId){
            $query = $this->db->prepare('SELECT * FROM `articles` WHERE `user_id` LIKE :id');
            $query->bindParam(':id', $authorId);
            try{
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo '<script language="javascript">';
                echo 'alert("' . $e->getMessage() . '")';
                echo '</script>';
                return null;
            }
            
            $return = [];
            
            foreach($result as $article){
                $return[] = new Article($article['id'], $article['title'], $article['content'], $article['user_id']);
            }

            if($result == null){
                return null;
            }

            return $return;
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
        
        public function createArticle(array $article){
            
            
            // seteamos las variables con sus valores correspondientes.
            $title = $article['title'];
            $content = $article['content'];
            $authorId = $article['authorId'];
            
            // preparamos la query y la bindeamos a las variables correspondientes.
            $query = $this->db->prepare('
            INSERT INTO `articles`(`id`, `title`, `content`, `user_id`, `created_at`, `updated_at`) 
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
                return null;
            }
            $newArticle = $this->getArticle($this->db->lastInsertId());
            var_dump($newArticle);           
            return $newArticle;
        }
        
        public function changeArticle(int $articleId, ...$changes){

        }
        public function deleteArticle(int $userId){

        }

        
        
        public function getComment(int $id){

            $query = $this->db->prepare('SELECT * FROM `comments` WHERE `id` = :id');
            $query->bindParam(':id', $id);
            try{
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e){
                echo '<script language="javascript">';
                echo 'alert("' . $e->getMessage() . '")';
                echo '</script>';
                return null;
            }
            
            if($result == null){
                return null;
            }

            return new Comment($result[0]['id'], $result[0]['article_id'],$result[0]['user_id'],$result[0]['created_at'],$result[0]['updated_at'],$result[0]['content']);
        }
        
        
        public function getAllCommentsOnArticle($article_id){
            $query = $this->db->prepare('SELECT * FROM `comments` WHERE `article_id` LIKE :id');
            $query->bindParam(':id', $article_id);
            try{
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo '<script language="javascript">';
                echo 'alert("' . $e->getMessage() . '")';
                echo '</script>';
                return null;
            }
            
            $return = [];
            
            foreach($result as $comment){
                $return[] = new Comment($comment['id'], $comment['article_id'], $comment['user_id'], $comment['created_at'], $comment['updated_at'], $comment['content']);
            }
            
            return $return;
        }

        public function getAllComments(){
            $query = $this->db->prepare('SELECT * FROM `comments`');
            try{
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                echo '<script language="javascript">';
                echo 'alert("' . $e->getMessage() . '")';
                echo '</script>';
                return null;
            }
            
            $return = [];
            
            foreach($result as $comment){
                $return[] = new Comment($comment['id'], $comment['title'], $comment['content'], $comment['user_id']);
            }
            
            return $return;
        }
        
        public function getAllCommentsByUser($authorId){
            $query = $this->db->prepare('SELECT * FROM `comments` WHERE `user_id` LIKE :id');
            $query->bindParam(':id', $authorId);
            try{
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo '<script language="javascript">';
                echo 'alert("' . $e->getMessage() . '")';
                echo '</script>';
                return null;
            }
            
            $return = [];
            
            foreach($result as $comment){
                $return[] = new Comment($comment['id'], $comment['title'], $comment['content'], $comment['user_id']);
            }
            
            return $return;
        }
        
        public function createComment(array $comment){
            
            // seteamos las variables con sus valores correspondientes.
            $content = $comment['comment_content'];
            $user_id = $comment['comment_user_id'];
            $article_id = $comment['comment_article_id'];
            
            // preparamos la query y la bindeamos a las variables correspondientes.
            $query = $this->db->prepare('
            INSERT INTO `comments`(`id`, `user_id`, `content`, `article_id`, `created_at`, `updated_at`) 
            VALUES (DEFAULT,:user_id,:content,:article_id,now(),now());');
            
            // hacemos param binding
            $query->bindParam(':user_id', $user_id);
            $query->bindParam(':content', $content);
            $query->bindParam(':article_id', $article_id);
            
            try{
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {                
                echo '<script language="javascript">';
                echo 'alert("' . $e->getMessage() . '")';
                echo '</script>';
                return null;
            }
            $newComment = $this->getComment($this->db->lastInsertId());
            return $newComment;
        }
        
        public function changeComment(int $commentId, ...$changes){

        }
        public function deleteComment(int $userId){

        }
    }