<?php

    class Users extends Dbc {

        public function getAllUsers(){

            $stmt = $this->connect()->prepare('SELECT * FROM `users`;');
            $stmt->execute();

            $allUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $allUsers;
        }

        public function getBanInfo($uid)
        {
            $stmt = $this->connect()->prepare('SELECT ban_tougle FROM `users` WHERE username = ?;');
            $stmt->execute([$uid]);

            $userBanInfo = $stmt->fetch(PDO::FETCH_ASSOC);
            return $userBanInfo;
        }

        public function banUser($uid)
        {
            $stmt = $this->connect()->prepare('UPDATE `users` SET `ban_tougle` = 1 WHERE `users`.`user_id` = ?;');
            $stmt->execute([$uid]);
        }

        public function unBanUser($uid)
        {
            $stmt = $this->connect()->prepare('UPDATE `users` SET `ban_tougle` = 0 WHERE `users`.`user_id` = ?;');
            $stmt->execute([$uid]);
        }
    }