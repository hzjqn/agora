<?php 
    abstract class Database
    {
        abstract public function getUser(string $usernameOrEmail);
    }
?>