<?php
    class Article extends Post
    {
    
        public function __construct(int $id, string $title, string $content, int $authorId){
            $this
                ->setTitle($title)
                ->setId($id)
                ->setAuthorId($authorId)
                ->setContent($content);
        }

        public function getTitle() :string{
            return $this->title;
        }

        /**
         * @return Article
         */
        public function setTitle(string $title) :Article{
            $this->title = $title;
            return $this;
        }
        
        public function getId(){
            return $this->id;
        }

        public function setId(int $id) :Article{
            $this->id = $id;
            return $this;
        }
        
        public function getContent() :string{
            return $this->content;
        }

        public function setContent(string $content) :Article{
            $this->content = $content;
            return $this;
        }
        
        public function getAuthorId() :int{
            return $this->authorId;
        }
        
        public function setAuthorId(string $authorId) :Article{
            $this->authorId = $authorId;
            return $this;
        }
    }