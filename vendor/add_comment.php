<?php

    $comment = $_POST["comment"];
    $post_id = $_POST["post_id"];
    $user_name = $_POST["user_name"];

    include_once "../classes/dbc.php";
    include_once "../classes/comments.php";
    include_once "../classes/comments-controller.php";

    $newComment = new CommentsController();
    $newComment->addNewComment($post_id, $user_name, $comment);

    header('Location: ../index.php');