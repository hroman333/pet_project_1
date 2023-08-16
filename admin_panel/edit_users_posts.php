<?php
 $username  = $_POST["user_name"];
 $title = $_POST["title"];;
 $text = $_POST["text"];;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/edit_users_posts.css">
    <title>Document</title>
</head>
<body>

<?php

    include_once "header_admin.php";

?>

<main class="main">
    <div class="profile">
        <div class="post-form">
            <form action="../vendor/edit_posts.php" method="post">
                <input type="text" name="user_name" value="<?php echo $username ?>">
                <div class="form-group">
                    <label for="title">Заголовок посту</label>
                    <input type="text" id="title" name="title" value="<?php echo $title ?>" required>
                </div>
                <div class="form-group">
                    <label for="content">Текст посту</label>
                    <textarea id="content" name="content" required><?php echo $text ?></textarea>
                </div>
                <button type="submit" class="submit-button">Редагувати</button>
            </form>
        </div>
    </div>
</main>

