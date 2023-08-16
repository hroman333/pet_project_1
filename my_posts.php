<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/profile.css">
    <title>Document</title>
</head>
<body>

<?php
    session_start();
    include_once "classes/dbc.php";
    include_once "classes/general-posts.php";

    $user_name = $_SESSION["username"];
    $currentPosts = new GeneralPosts();
    $currentPosts->getUsersPosts($user_name);
    $postsList = $currentPosts->getUsersPosts($user_name);


    include_once "header.php";
?>

<main class="main">
    <div class="profile">
        <div class="navigation">
            <ul>
                <li><a href="my_posts.php">Мої пости</a></li>
                <li><a href="profile.php">Створити пост</a></li>
            </ul>
        </div>
        <div class="post-form">
            <?php
            foreach ($postsList as $posts) {
                echo '<div class="post-container">';
                echo '<div class="post">';
                echo '<h2 class="post-title">' . $posts['title'] . '</h2>';
                echo '<p class="post-content">' . $posts["text"] . '</p>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</main>

</body>
</html>