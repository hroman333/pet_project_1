<?php

    class GeneralPosts extends Dbc {

        public function getAllPosts() {

            $stmt = $this->connect()->prepare('SELECT * FROM `general_posts`;');
            $stmt->execute();

            $allPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $allPosts;
        }

        public function getAllUsersPosts() {

            $stmt = $this->connect()->prepare('SELECT * FROM `users_posts`;');
            $stmt->execute();

            $allPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $allPosts;
        }

        public function getUsersPosts($uid) {

            $stmt = $this->connect()->prepare('SELECT * FROM `general_posts` WHERE user_name = ?;');
            $stmt->execute(array($uid));

            $usersPost = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $usersPost;
        }
    }
