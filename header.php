
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