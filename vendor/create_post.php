<?php

session_start();

$user_name = $_SESSION["username"];
$title = $_POST["title"];
$content = $_POST["content"];

include_once "../classes/dbc.php";
include_once "../classes/posts.php";
include_once "../classes/posts-controller.php";

$createPost = new PostsController($user_name, $title, $content);
$createPost->createNewUserPost();


header('Location: ../profile.php');