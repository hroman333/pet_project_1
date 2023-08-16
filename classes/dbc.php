<?php

class Dbc
{
    protected function connect()
    {
        try {
            $username = "root";
            $password = "";
            $connection = new PDO('mysql:host=localhost;dbname=forum', $username, $password);
            return $connection;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br>";
            die();
        }
    }
}