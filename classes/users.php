<?php

    class Users extends Dbc {

        public function getAllUsers(){

            $stmt = $this->connect()->prepare('SELECT * FROM `users`;');
            $stmt->execute();

            $allUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $allUsers;
        }
    }