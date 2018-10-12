<?php
    class JSONFile extends Database 
    {
        private $usersPath = ('users.json');
        private $articlesPath = ('articles.json');

        public function __construct(){
        }

        
        /**
         * Get the id value of the last user plus 1, for new posts
         */
        private function newUserId(){
            $file = json_decode(file_get_contents($this->usersPath), true);
            if(isset($file["users"][0]['id'])){
                return end(json_decode(file_get_contents($this->usersPath), true)["users"])['id'] + 1;
            } else {
                return 1;
            }
        }

        /**
         * Get the id value of the last post plus 1, for new posts
         */
        private function newPostId(){
            $file = json_decode(file_get_contents($this->articlesPath), true);
            if(isset($file["articles"][0]['id'])){
                return end(json_decode(file_get_contents($this->articlesPath), true)["articles"])['id'] + 1;
            } else {
                return 1;
            }
        }

        /**
         * Get the value of usersPath
         */ 
        public function getUserPath()
        {
                return $this->usersPath;
        }

        /**
         * Set the value of usersPath
         *
         * @return  self
         */ 
        public function setUserPath($usersPath)
        {
                $this->usersPath = $usersPath;

                return $this;
        }
        /**
         * Returns a User object with user data from db, expects a username string or a email string from a registered user.
         */
        public function getUser($usernameOrEmail){
            $file = json_decode(file_get_contents($this->usersPath), true);
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
         * Gets a User object from an user Id from DB;
         */
        public function getUserById(int $id){
            $file = json_decode(file_get_contents($this->usersPath), true);
            if(isset($file['users'])){
                foreach($file['users'] as $user){
                    if($id === $user['id']){
                        return new User($user['username'],$user['password'],$user['email'],$user['name'],$user['lastname'],$user['profilePhoto'],$user['id']);
                    }
                }
            }
            return false;   
        }

        /**
         * Gets an array of User objects from this database
         */
        public function getUsers(){
            $file = json_decode(file_get_contents($this->usersPath), true);
            if(isset($file['users']) && !empty($file['users'])){
                return $file['users'];
            }
            return false;
        }

        /**
         * Registers a user in the DB. Expects a User object
         */
        public function createUser(Array $user){

            $file = json_decode(file_get_contents($this->usersPath), true);

            $user['profilePhoto'] = null;
            $user['id'] = $this->newUserId();
            $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);

            if(isset($file['users'])){
                $file['users'][] = $user;
            } else {
                $file = ['users'=>[]];
                $file['users'][] = $user;
            }
            file_put_contents($this->usersPath,json_encode($file));
            return true;
        }

        /**
         * Changes user data from the db, expects a user id and the value from each changed attribute.
         */
        public function changeUser(int $userId, ...$changes){
            $file = json_decode(file_get_contents($this->usersPath), true);
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
            $file = json_decode(file_get_contents($this->usersPath), true);
            foreach ($file['users'] as $key => $currentUser){
                if($currentUser['id'] === $userId){
                    unset($file['users'][$key]);
                }
            }
            file_put_contents($this->usersPath,json_encode($file));
            return true;
        }

        

        public function getArticle(int $id){            
            $file = json_decode(file_get_contents($this->articlesPath), true);
            if(isset($file['articles'])){
                foreach($file['articles'] as $article){
                    if($id === $article['id']){
                        return new Article($article['id'],$article['title'],$article['content'],$article['authorId']);
                    }
                }
            }
            return false;
        }
        
        public function getAllArticles(){
            $file = json_decode(file_get_contents($this->articlesPath), true);
            if(isset($file['articles']) && !empty($file['articles'])){
                foreach ($file['articles'] as $article){
                    $allArticles[] = new Article($article['id'], $article['title'], $article['content'], $article['authorId']);
                }
                return $allArticles;
            }
            return false;
        }

        public function getAllArticlesByUser($authorId){
            $file = json_decode(file_get_contents($this->articlesPath), true);
            if(isset($file['articles'])){
                foreach($file['articles'] as $article){
                    if($authorId === $article['authorId']){
                        $articles[] = new Article($article['id'],$article['title'],$article['content'],$article['authorId']);
                    }
                }

                if($articles !== []){
                    return $articles;
                }
            }
            
            return false;
        }

        public function createArticle(array $article){
            $file = json_decode(file_get_contents($this->articlesPath), true);

            $article['coverPhoto'] = null;
            $article['id'] = $this->newPostId();

            if(isset($file['articles'])){
                var_dump($file, $article);
                $file['articles'][] = $article;
            } else {
                $file = ['articles'=>[]];
                $file['articles'][] = $article;
            }
            
            $newArticle = new Article($article['id'], $article['title'],$article['content'],$article['authorId']);

            file_put_contents($this->articlesPath,json_encode($file));
            return $newArticle;
        }

        public function changeArticle(int $articleId, ...$changes){

        }

        public function deleteArticle(int $userId){
            
        }
    }
?>