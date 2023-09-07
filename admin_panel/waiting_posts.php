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
    <?php foreach ($postsData as $post): ?>

        <div class="post-container">
            <div class="post">
                <div class="post-author"> Автор посту: <?php echo  $post['user_name'] ?> </div>
                <h2 class="post-title"> <?php echo $post['title'] ?> </h2>
                <p class="post-content"> <?php echo $post["text"] ?></p>

                <form action="../vendor/submit_post.php" method="post" class="post-actions">
                    <input type="hidden" name="user_name" value=" <?php echo $post['user_name'] ?>">
                    <input type="hidden" name="title" value=" <?php echo $post['title'] ?>">
                    <input type="hidden" name="text" value=" <?php echo $post['text'] ?> ">
                    <input type="hidden" name="id" value=" <?php echo $post['post_id'] ?> ">
                    <button type="submit" class="edit-button">Підтвердити</button>
                </form>

                <form action="../vendor/delete_users_post.php" method="post" class="post-actions">
                    <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">
                    <button type="submit" class="delete-button">Видалити</button>
                </form>

            </div>
        </div>

    <?php endforeach;

        if (isset($_SESSION["success_delete"]))
        {
            echo $_SESSION["success_delete"];
        }
        unset($_SESSION["success_delete"]);

    ?>



</main>

</body>
</html>