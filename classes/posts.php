<?php

    class Posts extends Dbc {
        protected function createUserPost($uid, $title, $text) {

            $stmt = $this->connect()->prepare('INSERT INTO `users_posts` (`user_name`, `post_id`, `title`, `text`) VALUES (?, NULL, ?, ?);');

            if (!$stmt->execute(array($uid, $title, $text))) {
                header("location: ../profile.php");
                session_start();
                    $_SESSION["success"] = "Успіше додавання посту";
                exit();
            }
            $stmt = null;
        }

        protected function createGeneralPost($uid, $title, $text) {

        $stmt = $this->connect()->prepare('INSERT INTO `general_posts` (`user_name`, `post_id`, `title`, `text`) SELECT ?, NULL, ?, ? FROM `users_posts`;');

            if (!$stmt->execute(array($uid, $title, $text))) {
                header("location: ../admin_panel/waiting_posts.php");
                session_start();
                $_SESSION["success"] = "Успіше додавання посту";
                exit();
            }
            $stmt = null;
        }

    }