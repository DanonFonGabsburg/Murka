<?php
require "db.php";

$data = $_POST;

if( isset($data['do_login']) )
{
    $errors = array();
    $user = R::findOne('users', 'email = ?', array($data['email']) );
    if( $user )
    {
        //логин существует 
        if( password_verify($data['password'], $user->password) ) {
            // Всё хорошо, логинимся
            $_SESSION['logged_user'] = $user;
            echo '<div style="color: green;">Вы успешно авторизовались!<br/>Перейти на <a href="/">главную</a></div><hr>';
        } else
        {
            $errors[] = 'Пароль введён неверно!';
        }
    } else
    {
        $errors[] = 'Пользователь с таким e-mail не найден!';
    }

    if( ! empty($errors) )
    {
        echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
    }
}


?>



<link rel="stylesheet" href="Slogin.css">
<body>
    <form action="login.php" method="POST">
        <div class="form1">
            <h1>Вход</h1>
            <div class="input-form">
                <input type="email" name="email" placeholder="E-mail" value="<?php echo @$data['email']; ?>">
            </div>
            <div class="input-form"> 
                <input type="password" name="password" placeholder="Пароль" value="<?php echo @$data['password']; ?>">
            </div>
            <div class="input-form">
                <input type="submit" name="do_login" value="Войти">
            </div>
        </div>
    </form>
</body>





