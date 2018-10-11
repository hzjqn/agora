<?php
    abstract class Post
    {
        protected $id;
        protected $title;
        protected $content;
        protected $authorId;

        abstract public function getId();
        abstract public function setId(int $id);
        abstract public function getTitle();
        abstract public function setTitle(string $title);
    }
?>