<?php


$post_id = $_POST["post_id"];

include_once "../classes/dbc.php";
include_once "../classes/posts.php";
include_once "../classes/posts-controller.php";

$delete = new PostsController($post_id, $post_id, $post_id);

$delete->deleteUsersPost($post_id);

$_SESSION["success_delete"] = "Succesfull deleting posts";
header('Location: ../admin_panel/waiting_posts.php');