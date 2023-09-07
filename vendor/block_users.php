<?php

    $user_id = $_POST["user_id"];

    include_once "../classes/dbc.php";
    include_once "../classes/users.php";

    $user = new Users();
    $getBan = $user->banUser($user_id);

    $_SESSION["success"] = "Successfull baned users";
    header('Location: ../admin_panel/admin.php');