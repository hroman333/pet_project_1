<?php
include_once "classes/dbc.php";
include_once "classes/users.php";

$info = new Users();

// Перевіряємо, чи існує ключ "username" у масиві $_SESSION
if (isset($_SESSION["username"])) {
    $banInfo = $info->getBanInfo($_SESSION["username"]);

    if ($banInfo["ban_tougle"] == 0) { ?>

        <header class="header">
            <a href="index.php" class="logo-link">
                <div class="logo">FORUM</div>
            </a>
            <div class="buttons">
                <a href="<?php echo isset($_SESSION["username"]) && $_SESSION["username"] == "admin" ? 'admin_panel/admin.php' : 'profile.php'; ?>" class="profile-link">
                    <?php
                    if (isset($_SESSION["username"])) {
                        echo $_SESSION["username"];
                    }
                    ?>
                </a>
                <?php

                if (isset($_SESSION["username"]))
                {
                    echo '<button class="logout-button" onclick="window.location.href=\'vendor/logout.php\'">Вийти</button>';
                } else
                {
                    echo '<button class="login-button" onclick="window.location.href=\'login.php\'">Login</button>';
                    echo '<button class="signup-button" onclick="window.location.href=\'signup.php\'">Signup</button>';
                }
                ?>
            </div>
        </header>

  <?php  } else {
        echo "You are banned";
        echo '<button class="logout-button" onclick="window.location.href=\'vendor/logout.php\'">Вийти</button>';
    }
} else
{ ?>
<header class="header">
    <a href="index.php" class="logo-link">
        <div class="logo">FORUM</div>
    </a>
    <div class="buttons">
        <?php
        echo '<button class="login-button" onclick="window.location.href=\'login.php\'">Login</button>';
        echo '<button class="signup-button" onclick="window.location.href=\'signup.php\'">Signup</button>';
        echo '</div>';
        echo '</header>';
}
?>

