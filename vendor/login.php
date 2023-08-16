<?php

    $username = $_POST["username"];
    $password = $_POST["password"];

    include_once "../classes/dbc.php";
    include_once "../classes/login-class.php";
    include_once "../classes/login-controller.php";

    $userN = new LoginController($username, $password);
    $userN->loginUser();


    if ($username === "admin" && $password === "1111") {

        //Создать чекбокс при нажатії якого буде кидать сюда

        header('Location: ../admin_panel/admin.php');
    }
    else
    {

        header('Location: ../index.php');
    }




