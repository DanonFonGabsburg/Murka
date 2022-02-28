<?php

require "db.php";

?>

<?php if( isset($_SESSION['logged_user']) ) : ?>
    <link rel="stylesheet" href="Sindex2.css">
    <body>
        <div class="form1">
            <h2>Вы авторизованы!</h2><br>
            <div class="input-form">
                <a href="/kabinet.php" type="submit">Личный кабинет</a>
            </div>
            <div class="input-form">
                <a href="/logout.php" type="submit">Выйти</a>
            </div>
        </div>
    </body>
<?php else : ?>
    <link rel="stylesheet" href="Sindex.css">
    <body>
        <div class="form1">
            <h2>Чего же вы ждёте?<br>Скорее авторизуйтесь!</h2>
            <div class="input-form">
                <a href="/login.php" type="submit">Авторизация</a>
            </div>
            <div class="input-form">
                <a href="/signup.php" type="submit">Регистрация</a>
            </div>
        </div>
    </body>
<?php endif; ?>

