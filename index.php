<?php

require "db.php";

?>
<?php if( isset($_SESSION['logged_user']) ) : ?>
    Вы авторизованы!<br>
    <a href="/kabinet.php">Личный кабинет</a><br>
    <a href="/logout.php">Выйти</a>
<?php else : ?>
Чего же вы ждёте? Скорее авторизуйтесь!<br>
<a href="/login.php">Авторизоваться</a><br>
<a href="/signup.php">Регистрация</a>
<?php endif; ?>
