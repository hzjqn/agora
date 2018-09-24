<?php 
    abstract class Database
    {
        abstract public function createUser();
        abstract public function deleteUser();
        abstract public function updateUser();
        abstract public function getUserData();
    }
?>