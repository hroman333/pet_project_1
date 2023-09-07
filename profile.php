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
    $waitedPostsList = $currentPosts->getAllWaitedPosts($user_name);


    include_once "header.php";


?>

<main class="main">
    <div class="profile">
        <div class="navigation">
            <ul>
                <li><a href="my_posts.php">Мої пости</a></li>
                <li><a href="profile.php">Створити пост</a></li>
                <li><a href="waited_posts.php">Пости очікуючи підтвердження : <?php $count = count($waitedPostsList); echo $count; ?></a></li>
            </ul>
        </div>
        <div class="post-form">
            <form action="vendor/create_post.php" method="post">
                <input type="hidden" name="<?php echo $_SESSION['user_id'];?>">
                <div class="form-group">
                    <label for="title">Заголовок посту</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="content">Текст посту</label>
                    <textarea id="content" name="content" required></textarea>
                </div>
                <button type="submit" class="submit-button">Створити</button>
            </form>
        </div>
    </div>
</main>

</body>
</html>