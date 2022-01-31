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
    $user->passport = $data['new_passport'];
    $user->passport_2 = $data['new_passport_2'];
    R::store( $user );
    echo '<div style="color: green;">Данные успешно изменены!<br/>Перейти на <a href="/">главную</a></div><hr>';
} 

?>





<title>Update data</title>

    <h2>Изменение личных данных</h2>
    <form action="/update.php" method="post">
        <p>ФИО</p>
        <input type="text" name="new_login"> 
        <p>E-mail</p>
        <input type="email" name="new_email">
        <p>Серия паспорта</p>
        <input type="passport" name="new_passport">
        <p>Номер паспорта</p>
        <input type="passport" name="new_passport_2"><br> <br>
        <button type="submit" name="do_update">Сохранить изменения</button>
    </form>

