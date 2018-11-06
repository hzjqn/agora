<?php
    
    class Migration
    {    
        public static function mySqlToJson(){
            $jsonDb = new JSONFile();
            $mysqlDb = new MySQL();

            $articlesInMySql = $mySqldb->getAllArticles();
            $usersInMySql = $mySqldb->getAllUsers();
            $commentsInMySql = $mySqldb->getAllComments();

            foreach($articlesInMySql as $article){
                $jsonDb->createArticleFormObject($article);
            }

            foreach($usersInMySql as $user){
                $jsonDb->createUserFormObject($user);    
            }

            foreach($commentsInMySql as $comment){
                $jsonDb->createCommentFormObject($user);    
            }
        }

        public static function jsonToMySql(){
            $jsonDb = new JSONFile();
            $mysqlDb = new MySQL();

            $articlesInJson = $jsonDb->getAllArticles();
            $usersInJson = $jsonDb->getAllUsers();
            $commentsInJson = $jsonDb->getAllComments();

            foreach($articlesInJson as $article){
                $mysqlDb->createArticleFormObject($article);
            }

            foreach($usersInJson as $user){
                $mysqlDb->createUserFormObject($user);    
            }

            foreach($commentsInJson as $comment){
                $mysqlDb->createCommentFormObject($user);    
            }
        }

        public static function createDb($type){
            if($type == "json"){
                $users = ['users' => []];
                file_put_contents('users.json', json_encode($users));
                
                $articles = ['articles' => []];
                file_put_contents('articles.json', json_encode($articles));
                
                $comments = ['comments' => []];
                file_put_contents('comments.json', json_encode($comments));

            } else if ($type == "mysql" || $type == "sql"){

                $dbname = 'agora';
                $dbuser = 'root';
                $dbpassword = 'root';
                $host = 'localhost';
                $charset = 'utf8mb4';

                $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
                $user = $dbuser;
                $password = $dbpassword;

                try{    
                    $mySqldb = new PDO($dsn, $user, $password);
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

                $query = $mySqldb->prepare(
                    "CREATE TABLE users(
                    id INT NOT NULL,
                    username VARCHAR(32) NOT NULL,
                    password VARCHAR(64) NOT NULL,
                    email TINYTEXT NOT NULL,
                    name TINYTEXT NOT NULL,
                    lastname TINYTEXT NOT NULL,
                    profilePhoto VARCHAR(32),
                    created_at DATETIME,
                    updated_at DATETIME,
                    PRIMARY KEY (id));
                    
                    CREATE TABLE articles (
                    id INT NOT NULL,
                    title VARCHAR(128) NOT NULL,
                    user_id INT NOT NULL,
                    content TEXT NOT NULL,
                    created_at DATETIME,
                    updated_at DATETIME,
                    PRIMARY KEY (id));
                    
                    CREATE TABLE comments (
                    id INT NOT NULL,
                    article_id INT NOT NULL,
                    user_id INT NOT NULL,
                    content TEXT NOT NULL,
                    created_at DATETIME,
                    updated_at DATETIME,
                    PRIMARY KEY (id));
                    "
                    );

                try{
                    $query->execute();
                } catch(PDOException $e) {
                    echo $e->getMessage();
                }

            } else if ($type == "all" || $type == "a"){
                $users = ['users' => []];
                file_put_contents('users.json', json_encode($users));
                
                $articles = ['articles' => []];
                file_put_contents('articles.json', json_encode($articles));
                
                $comments = ['comments' => []];
                file_put_contents('comments.json', json_encode($comments));

                
                $dbname = 'agora_db';
                $dbuser = 'root';
                $dbpassword = 'root';
                $host = 'localhost';
                $charset = 'utf8mb4';

                $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
                $user = $dbuser;
                $password = $dbpassword;

                try{    
                    $mySqldb = new PDO($dsn, $user, $password);
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
                echo 'PDO Creado';
                $query = $mySqldb->prepare(
                    "CREATE TABLE users(
                    id INT NOT NULL AUTO_INCREMENT,
                    username VARCHAR(32) NOT NULL,
                    password VARCHAR(64) NOT NULL,
                    email TINYTEXT NOT NULL,
                    name TINYTEXT NOT NULL,
                    lastname TINYTEXT NOT NULL,
                    profilePhoto VARCHAR(32),
                    created_at DATETIME,
                    updated_at DATETIME,
                    PRIMARY KEY (id));
                    
                    CREATE TABLE articles (
                    id INT NOT NULL AUTO_INCREMENT,
                    title VARCHAR(128) NOT NULL,
                    user_id INT NOT NULL,
                    content TEXT NOT NULL,
                    created_at DATETIME,
                    updated_at DATETIME,
                    PRIMARY KEY (id));
                    
                    CREATE TABLE comments (
                    id INT NOT NULL AUTO_INCREMENT,
                    article_id INT NOT NULL,
                    user_id INT NOT NULL,
                    content TEXT NOT NULL,
                    created_at DATETIME,
                    updated_at DATETIME,
                    PRIMARY KEY (id));
                    "
                    );

                try{
                    $query->execute();
                } catch(PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }

        public static function migrate($to = null, $from = null){
            self::createDb($to);
            if($to == 'json'){
                self::mySqlToJson();
            } else if($to == 'mysql' || $to == 'sql') {
                self::jsonToMySql();
            } else if($to == 'a' || $to == 'all') {
                self::mySqlToJson();
                self::jsonToMySql();
            }
        }
    }
?>