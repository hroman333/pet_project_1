<?php

session_start();

$user_name = $_POST["user_name"];
$title = $_POST["title"];
$content = $_POST["text"];
$id = $_POST["id"];

include_once "../classes/dbc.php";
include_once "../classes/posts.php";
include_once "../classes/posts-controller.php";

$createPost = new PostsController($user_name, $title, $content);
$createPost->createNewGeneralPost();

$deletePost = new PostsController($user_name, $title, $content);
$deletePost->deleteUsersPost($id);


header('Location: ../admin_panel/waiting_posts.php');