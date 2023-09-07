<?php
    session_start();
    include_once "../classes/dbc.php";
    include_once "../classes/users.php";

    $users = new Users();
    $allUsers = $users->getAllUsers();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/admin.css">
    <title>Панель адміністратора</title>
</head>
<body>

<?php
    include_once "header_admin.php";
?>

<main class="admin-main">
    <div class="users-table">
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Дії</th>
            </tr>
            <?php foreach ($allUsers as $user): ?>
                <tr>
                    <td><?php echo $user["user_id"]; ?></td>
                    <td><?php echo $user["username"]; ?></td>
                    <td>
                        <?php
                            $banCheck = $users->getBanInfo($user["username"]);

                            if ($banCheck["ban_tougle"] == 1 )
                            { ?>
                                <form action="../vendor/unblock.php" method="post" class="post-actions">
                                    <input type="hidden" name="user_id" value="<?php echo $user["user_id"]; ?>">
                                    <button class="block-button">Розблокувати</button>
                                </form>
                            <?php
                            } else
                            { ?>
                                <form action="../vendor/block_users.php" method="post" class="post-actions">
                                    <input type="hidden" name="user_id" value="<?php echo $user["user_id"]; ?>">
                                    <button class="block-button">Заблокувати</button>
                                </form>
                            <?php }
                        ?>
                    </td>
                </tr>
            <?php endforeach;

            if (isset($_SESSION["success"])) {
                echo $_SESSION["success"];
            }
            unset($_SESSION["success"]);
            ?>

        </table>
    </div>
</main>
</body>
</html>

