<?php
        $un = $_POST["username"];
        $pwd = $_POST["password"];
        $pwdRepeat = $_POST["confirm_password"];

        include "../classes/dbc.php";
        include "../classes/signup.php";
        include "../classes/signup-controller.php";

        $signup = new SignupController($un, $pwd, $pwdRepeat);
        $signup->signupUser();

        header('Location: ../index.php?error=none');
