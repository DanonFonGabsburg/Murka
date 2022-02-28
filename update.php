<?php
require "db.php";
$data = $_POST;
?>


<?php

if( isset($data['do_update']) )
{
    $user = $_SESSION['logged_user'];
    $user->login = $data['new_login'];
    $user->email = $data['new_email'];
    $user->password = password_hash($data['new_password'], PASSWORD_DEFAULT);
    $user->passport = $data['new_passport'];
    $user->passport_2 = $data['new_passport_2'];
    R::store( $user );
    echo '<div style="color: green;">Данные успешно изменены!<br/>Перейти на <a href="/">главную</a></div><hr>';
} 

?>

<link rel="stylesheet" href="Supdate.css">
<body>
    <form action="/update.php" method="post">
        <div class="form1">
            <h2>Изменение личных данных</h2>
            <h3>*Если вы не хотите менять данные, в поле ввода впишите уже существущее значение</h3>
            <div class="input-form">
                <input type="text" name="new_login" placeholder="ФИО" value="<?php echo @$data['new_login']; ?>">
            </div>

            <div class="input-form">
                <input type="email" name="new_email" placeholder="E-mail" value="<?php echo @$data['new_email']; ?>">
            </div>

            <div class="input-form">
                <input type="password" name="new_password" placeholder="Пароль" value="<?php echo @$data['new_password']; ?>">
            </div>

            <div class="input-form">
                <input type="passport" name="new_passport" placeholder="Серия паспорта" value="<?php echo @$data['new_passport']; ?>">
            </div>

            <div class="input-form">
                <input type="passport" name="new_passport_2" placeholder="Номер паспорта" value="<?php echo @$data['new_passport_2']; ?>">
            </div>

            <div class="input-form">
                <input type="submit" name="do_update" value="Сохранить изменения">
            </div>
        </duv>
    </form>
</body>

