<?php

session_start();

echo $user_name = $_POST["user_name"];
echo $title = $_POST["title"];
echo $content = $_POST["content"];
echo $post_id = $_POST["post_id"];

include_once "../classes/dbc.php";
include_once "../classes/posts.php";
include_once "../classes/posts-controller.php";

$updatePost = new PostsController($title, $content, $post_id);
$updatePost->updateGeneralPost($title, $content, $post_id);

$_SESSION["success"] = "Successfull editing post";
header('Location: ../admin_panel/users_posts.php');

