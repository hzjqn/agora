<?php 
    abstract class Database
    {
        abstract public function getUser(string $usernameOrEmail);
        abstract public function getUserById(int $id);
        abstract public function getUsers();
        abstract public function createUser(array $user);
        abstract public function changeUser(int $userId, ...$changes);
        abstract public function deleteUser(int $userId);

        abstract public function getArticle(int $id);
        abstract public function getAllArticles();
        abstract public function getAllArticlesByUser($usernameOrUserId);
        abstract public function createArticle(array $article);
        abstract public function changeArticle(int $articleId, ...$changes);
        abstract public function deleteArticle(int $userId);
    }
?>