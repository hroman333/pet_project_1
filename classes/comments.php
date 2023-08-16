<?php

    class Comments extends Dbc {

        protected function addComment($postid, $username, $comment) {

            $stmt = $this->connect()->prepare('INSERT INTO `comments` (`comment_id`, `post_id`, `user_name`, `comment`) VALUES (NULL, ?, ?, ?);');

            if (!$stmt->execute(array($postid, $username, $comment))) {
                header("location: ../index.php");
                exit();
            }
        }

        protected function showAllComments($postid) {

            $stmt = $this->connect()->prepare('SELECT * FROM `comments` WHERE post_id = ?;');

            if (!$stmt->execute(array($postid))) {
                header("location: ../index.php");
                exit();
            }

            $stmt->execute(array($postid));
            $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $comments;
        }
    }