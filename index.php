<?php
    session_start();
    include_once "classes/dbc.php";
    include_once "classes/general-posts.php";
    include_once "classes/comments.php";
    include_once "classes/comments-controller.php";

    $allPosts = new GeneralPosts();
    $postsData = $allPosts->getAllPosts();

    $showComments = new CommentsController();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/index.css">
    <title>Document</title>
</head>
<body>

<?php
include_once "header.php"
?>

<main class="main">

    <div class="posts-container">
        <?php foreach ($postsData as $post): ?>
            <div class="post-container">
                <div class="post">
                    <div class="post-author"> Автор посту: <?php echo $post['user_name']; ?></div>
                    <h2 class="post-title"><?php echo $post['title']; ?></h2>
                    <p class="post-content"><?php echo $post["text"]; ?></p>
                </div>
                <div class="comment-section">
                    <h3 class="comment-title">Коментарі</h3>
                    <!-- Блок для виведення коментарів -->
                    <div class="comment">
                        <p class="comment-content">

                            <?php
                              $allComments =  $showComments->showAllCurrentComments($post['post_id']);
                              foreach ($allComments as $comment)
                              {
                                  echo "Aвтор коментару: ";
                                  echo $comment['user_name'];
                            ?>
                            <h4> Коментар</h4>

                            <?php
                                 echo $comment['comment'];
                                 echo '<br>';
                                 echo '___________';
                                 echo '<br>';
                                 echo '<br>';
                            }
                            ?>

                        </p>
                    </div>
                    <!-- Форма для коментарів -->
                    <form action="vendor/add_comment.php" method="post" class="comment-form">
                        <input type="hidden" name="post_id" value="<?php echo $post['post_id'] ?>">
                        <input type="hidden" name="user_name" value="<?php
                        if (isset($_SESSION["username"]))
                        {
                            echo  $_SESSION["username"];
                        }
                        ?>">
                        <input type="text" name="comment" placeholder="Ваш коментар" class="comment-input">
                        <button type="submit" class="comment-button">Відправити коментар</button>
                    </form>
                </div>
            </div>
        <br>
        <br>
        <br>
        <?php endforeach; ?>
    </div>

</main>
</body>
</html>