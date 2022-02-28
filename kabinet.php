<?php

require "db.php";

?>
<?php if( isset($_SESSION['logged_user']) ) : ?>
    <link rel="stylesheet" href="Skabinet.css">
    <body>
        <div class="form1">
            <h1>Личный Кабинет</h1>
            <p>Приветсвуем вас, <?php echo $_SESSION['logged_user']->login; ?><br></p> 
            <p>Ваш E-mail: <?php echo $_SESSION['logged_user']->email; ?><br></p>
            <p>Серия вашего паспорта: <?php echo $_SESSION['logged_user']->passport; ?><br></p>
            <p>Номер вашего паспорта: <?php echo $_SESSION['logged_user']->passport_2; ?><br></p>
            <div class="input-form">
                <a href="/update.php" type="submit">Изменить личные данные</a><br>
            </div>
            <div class="input-form">
                <a href="/index.php" type="submit">На глваную</a>
            </div>
        </div>
    </body>
<?php endif; ?>
