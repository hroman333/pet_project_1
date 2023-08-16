<?php

    class Signup extends Dbc {

        protected function setUser($un, $pwd) {
            $stmt=$this->connect()->prepare('INSERT INTO `users` (`user_id`, `username`, `password`) VALUES (NULL, ?, ?);');

            if (!$stmt->execute(array($un, $pwd))) {
                $stmt = null;
                header("location: ../signup.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }

        protected function checkUser($un) {
            $stmt = $this->connect()->prepare('SELECT user_id FROM users WHERE user_id = ?;');

            if (!$stmt->execute(array($un))) {
                $stmt = null;
                header("location: ../signup.php?error=stmtfailed");
                exit();
            }

            $resultCheck;
            if ($stmt->rowCount() > 0) {
                $resultCheck = false;
            } else {
                $resultCheck = true;
            }

            return $resultCheck;
        }
    }