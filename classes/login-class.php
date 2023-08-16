<?php

class Login extends Dbc {
    protected function getUser($un, $pwd) {

        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username = ? AND password = ?;');

        if (!$stmt->execute(array($un, $pwd))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../index.php?error=user_not_exist");
            exit();
        }

        $stmt->execute(array($un, $pwd));
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["username"] = $user[0]["username"];
            $_SESSION["user_id"] = $user[0]["user_id"];
    }

}