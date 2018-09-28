<?php 
    abstract class Database
    {
        abstract public function getUser(string $usernameOrEmail);
        abstract public function getUsers();
        abstract public function createUser(User $user);
        abstract public function changeUser(int $userId, ...$changes);
        abstract public function deleteUser(int $userId);
    }
?>