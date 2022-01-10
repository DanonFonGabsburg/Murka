<?php

require "db.php";

?>
<?php if( isset($_SESSION['logged_user']) ) : ?>
    Приветсвуем вас, <?php echo $_SESSION['logged_user']->login; ?><br> 
    Ваш E-mail: <?php echo $_SESSION['logged_user']->email; ?><br>
    Серия вашего паспорта: <?php echo $_SESSION['logged_user']->passport; ?><br>
    Номер вашего паспорта: <?php echo $_SESSION['logged_user']->passport_2; ?><br>
<a href="/update.php">Изменить личные данные</a><br>
<a href="/index.php">На глвную</a>
<?php endif; ?>
