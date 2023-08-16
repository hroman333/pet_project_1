<?php

    class PostsController extends Posts {

        protected $uid;
        protected $title;
        protected $text;

        public function __construct($uid, $title, $text) {
            $this->uid = $uid;
            $this->title = $title;
            $this->text = $text;
        }

        public function createNewUserPost()
        {
            $this->createUserPost($this->uid, $this->title, $this->text);
        }

        public function createNewGeneralPost()
        {
            $this->createGeneralPost($this->uid, $this->title, $this->text);
        }

        public function deleteUsersPost($pid) {

            $stmt = $this->connect()->prepare('DELETE FROM users_posts WHERE post_id = ?;');

            if (!$stmt->execute(array($pid))) {
                session_start();
                $_SESSION["success"] = "Успіше видалення посту";
                exit();
            }
            $stmt = null;
        }

        public function deleteGeneralPost($uid) {

            $stmt = $this->connect()->prepare('DELETE FROM general_posts WHERE `general_posts`.`post_id` = ?;');

            $stmt->execute(array($uid));
            session_start();
            $_SESSION["success_deleting"] = "Успішне видалення посту";
        }
    }