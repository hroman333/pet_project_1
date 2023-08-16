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
            <?php
            foreach ($allUsers as $user) {
                echo '<tr>';
                echo '<td>' . $user["user_id"] . '</td>';
                echo '<td>' . $user["username"] . '</td>';
                echo '<td>';
                echo '<button class="block-button">Заблокувати</button>';
                echo '<button class="info-button">Інформація</button>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
</main>
</body>
</html>

