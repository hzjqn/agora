<?php
    class Comment
    {
        private $id;
        private $article_id;
        private $user_id;
        private $created_at;
        private $updated_at;
        private $content;

        public function __construct(int $id, int $article_id, int $user_id, string $created_at, string $updated_at, string $content){
            $this->setId($id);
            $this->setArticleId($article_id);
            $this->setUserId($user_id);
            $this->setCreatedAt($created_at);
            $this->setUpdatedAt($updated_at);
            $this->setContent($content);
        }

        public function getId(){
            return $this->id;
        }
        
        public function setId($id){
             $this->id = $id;
             return $this;
        }
        
        public function getArticleId(){
            return $this->article_id;
        }
        
        public function setArticleId($id){
             $this->article_id = $id;
             return $this;
        }

        public function getUserId(){
            return $this->user_id;
        }

        public function setUserId($id){
            $this->user_id = $id;
            return $this;
        }

        public function getUpdatedAt(){
            return $this->updated_at;
        }

        public function setUpdatedAt($timedate){
            $this->updated_at = $timedate;
            return $this;
        }

        
        public function getCreatedAt(){
            return $this->created_at;
        }

        public function setCreatedAt($timedate){
            $this->created_at = $timedate;
            return $this;
        }
        
        public function getContent(){
            return $this->content;
        }

        public function setContent($content){
            $this->content = $content;
            return $this;
        }
    }
    ?>