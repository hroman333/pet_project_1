<?php

session_start();
include_once "../classes/dbc.php";
include_once "../classes/general-posts.php";

$allPosts = new GeneralPosts();
$postsData = $allPosts->getAllUsersPosts();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/admin.css">
    <title>Document</title>
</head>
<body>

<?php
    include_once "header_admin.php";
?>

<main class="main">
    <?php
    foreach ($postsData as $posts)
    {
        echo '<div class="post-container">';
        echo '<div class="post">';
        echo '<div class="post-author"> Автор посту: ' . $posts['user_name'] . '</div>';
        echo '<h2 class="post-title">' . $posts['title'] . '</h2>';
        echo '<p class="post-content">' . $posts["text"] . '</p>';
        echo '<form action="../vendor/submit_post.php" method="post" class="post-actions">';
        echo '<input type="hidden" name="user_name" value="' . $posts['user_name'] . '">';
        echo '<input type="hidden" name="title" value="' . $posts['title'] . '">';
        echo '<input type="hidden" name="text" value="' . $posts['text'] . '">';
        echo '<input type="hidden" name="id" value="' . $posts['post_id'] . '">';
        echo '<button type="submit" class="edit-button">Підтвердити</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
    ?>


</main>

</body>
</html>