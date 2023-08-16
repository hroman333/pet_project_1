<?php

$post_id = $_POST["post_id"];

include_once "../classes/dbc.php";
include_once "../classes/posts.php";
include_once "../classes/posts-controller.php";

$delete = new PostsController($post_id, $post_id, $post_id);

$delete->deleteGeneralPost($post_id);

header('Location: ../admin_panel/users_posts.php');